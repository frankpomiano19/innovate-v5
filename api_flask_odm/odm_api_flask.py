import os
from flask import Flask, jsonify
from config import config
from flask_mysqldb import MySQL
from flask_cors import CORS
from pyodm import Node, exceptions

##################################### COMUNICACIÓN FLASK ###################################

app = Flask(__name__)
conexion = MySQL(app)

##################################### CORS(app) #####################################
CORS(app)
CORS(app, resources={r"/proyect/*": {"origins": "*"}})

################################ VARIABLES GLOBALES ########################################

path_base= "/mnt/vol1/files/"
#path_base_developer="C:/xampp/htdocs/innovate-v4/files/"
#path_base_developer_result="C:/xampp/htdocs/files/"
 
#################################### FUNCIONES ###########################################
@app.route('/proyect/<token>/', methods=['POST'])
def transformar(token):
    path_imagenes = path_base+token+'/imagenes'
    path_results = path_base+token+'/results'
    if(not os.path.exists(path_imagenes)):
        return jsonify({'mensaje': "Ruta no creada." , 'proyecto':token, 'exito': False})
    lista = lista_imagenes(path_imagenes)
    procesarImagen(lista,path_results)
    guardarRuta(path_results,token)


def procesarImagen(lista,path_results):
    node = Node("localhost", 3000)
    try:
        # Start a task
        print("Uploading images...")
        task= node.create_task(lista,
                                {'dsm': False, 'orthophoto-resolution': 4, 'resize-to': -1 },
                                name= 'a3')
        print(task.info())

        try:
            # This will block until the task is finished
            # or will raise an exception
            task.wait_for_completion()

            print("Task completed, downloading results...")

            # Retrieve results
            task.download_assets(path_results)

            print("Assets saved in results")

            # Restart task and this time compute dtm
            task.restart({'dtm': True})
            task.wait_for_completion()

            print("Task completed, downloading results...")

            task.download_assets(path_results + "/results_with_dtm")

            print("Assets saved in ./results_with_dtm")
        
        except exceptions.TaskFailedError as e:
            print("\n".join(task.output()))

    except exceptions.NodeConnectionError as e:
        print("Cannot connect: %s" % e)
        
    except exceptions.NodeResponseError as e:
        print("Error: %s" % e)
    


def guardarRuta(path_result,token):
    try:
        cursor = conexion.connection.cursor()
        sql = "UPDATE proyects SET proyect_result_process = '{0}',  WHERE proyect_token_security = '{1}'".format(path_result, token)
        cursor.execute(sql)
        conexion.connection.commit()
        cursor.close()
        return jsonify({'mensaje': "Ruta actualizada correctamente.", 'exito': True})
    except Exception as ex:
        return jsonify({'mensaje': "Error al entrar", 'exito': False})




def lista_imagenes(path_carpeta):
    lista= []  
    image_list= os.listdir(path_carpeta)

    for image in image_list:
        individual_path=  path_carpeta + "/" + image
        lista.append(individual_path)

    return lista


@app.route('/enlace/<token>/', methods=['POST'])
def devolverEnlace(token):
    path_results = path_base+token+'/results'
    if(not os.path.exists(path_results)):
        return jsonify({'mensaje': "Ruta no creada." , 'proyecto':token, 'exito': False})
    path_result_for_php = "../files/"+token+"/results/odm_orthophoto/odm_orthophoto.tif"
    path_real = path_results+"/odm_orthophoto/odm_orthophoto.tif"
    return jsonify({'ruta': path_result_for_php ,'rutaalt': path_real,'proyecto':token, 'exito': True})


@app.route('/prueba/', methods=['GET'])
def pruebaServidor():
    try:
        cursor = conexion.connection.cursor()
        sql = "SELECT doc_num,razon_social,email_empresa FROM empresa"
        cursor.execute(sql)
        datos = cursor.fetchall()
        empresas = []
        for fila in datos:
            empresa = {'codigo': fila[0], 'razon social': fila[1], 'email': fila[2]}
            empresas.append(empresa)
        return jsonify({'empresas': empresas, 'mensaje': "La conexion a la base de datos es exitosas", 'exito': True})

    except Exception as ex:
        return jsonify({'mensaje': "Error, no se pudo conectar a la base de datos", 'exito': False})

@app.route('/', methods=['GET'])
def prueba():
    return "BIENVENIDOS"


if __name__ == '__main__':
    app.config.from_object(config['production'])
    app.run(host='0.0.0.0',port=5000)
    
