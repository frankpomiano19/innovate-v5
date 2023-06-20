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
def enviar_mensaje():
    #print(request.json)
    usuario = request.json["user"]
    password = request.json["password"]
    try:
        remitente = "confirmacion@geomaticspace.com"
        destinatario = usuario
        asunto = "Registro en GGreen"
        enlace = "http://144.22.43.182/verify.php?email="+usuario+"&hash="+password
        mensaje = """Muchas gracias por registrarte en GGreen Innovate
        """
        #mensaje_completo = mensaje+enlace
        email = MIMEMultipart()
        email['From'] = "GGreen" +"<"+remitente+">"
        email['To'] = destinatario
        email['Subject'] = asunto
        html = """\
            <html>
            <head></head>
            <body>
                <img src="http://144.22.43.182/assets/img/logos/logo.png">
                <p>%s<br>
                
                Haga clic <a href="%s">aquí</a> para activar su cuenta.
                </p>
            </body>
            </html>
            """%(mensaje,enlace)
        


        #email.attach(MIMEText(mensaje_completo, 'plain'))

        email.attach(MIMEText(html, 'html'))
        server = smtplib.SMTP('smtp.gmail.com',587)
        server.ehlo()
        #Encriptacion
        server.starttls()
        server.login('confirmacion@geomaticspace.com','uoqmmjvyvwojganx')
        server.sendmail(remitente,destinatario,email.as_string())
        server.quit()
        #print("El correo se envió exitosamente")
        return jsonify({'mensaje': "Mensaje enviado.", 'exito': True})
    except Exception as ex:
        return jsonify({'mensaje': "Error al enviar", 'exito': False})







#################################### PRINCIPAL ###########################################
if __name__ == '__main__':
    app.config['DEBUG'] = True
    app.run(host='0.0.0.0',port=6000)