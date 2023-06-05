import os
from flask import Flask, jsonify, request
from flask_cors import CORS
import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

##################################### COMUNICACIÓN FLASK ###################################

app = Flask(__name__)

##################################### CORS(app) #####################################
CORS(app)


#################################### FUNCIONES ###########################################
@app.route('/', methods=['GET'])
def prueba():
    return "<h1>BIENVENIDOS</h1>"

@app.route('/send/', methods=['POST'])
def registrar_curso():
    print(request.json)
    usuario = request.json["user"]
    password = request.json["password"]
    try:
        remitente = "kevinmenesesdeveloper@gmail.com"
        destinatario = usuario
        asunto = "Registro en GGreen"
        enlace = "http://localhost/innovate-v5/verify.php?email="+usuario+"&hash="+password
        mensaje = """Gracias por registrarte en GGreen Innovate
        Haga clic en el enlace para activar su cuenta:
        
        """
        mensaje_completo = mensaje+enlace
        email = MIMEMultipart()
        email['From'] = "GGreen" +"<"+remitente+">"
        email['To'] = destinatario
        email['Subject'] = asunto
        email.attach(MIMEText(mensaje_completo, 'plain'))
        server = smtplib.SMTP('smtp.gmail.com',587)
        server.ehlo()
        #Encriptacion
        server.starttls()
        server.login('kevinmenesesdeveloper@gmail.com','tttoeuohvwawgkvt')
        server.sendmail(remitente,destinatario,email.as_string())
        server.quit()
        print("El correo se envió exitosamente")
        return jsonify({'mensaje': "Mensaje enviado.", 'exito': True})
    except Exception as ex:
        return jsonify({'mensaje': "Error al enviar", 'exito': False})







#################################### PRINCIPAL ###########################################
if __name__ == '__main__':
    app.config['DEBUG'] = True
    app.run(host='0.0.0.0',port=6000)