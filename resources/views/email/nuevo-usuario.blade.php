<head>
    <h1>GESCOMVE</h1>
    <hr>
</head>
<body>
    <h1>Hello {{$usuario->name}},</h1>

    <p>Thank you for joining GESCOMVE.</p>

    <p>We’d like to confirm that your account was created successfully. To access GESCOMVE click the link below.</p>
    <p>If you experience any issues logging into your account, reach out to us at sugerencias@gescomve.com . </p>
    <p>Email{{$usuario->email}}</p>
    <p>Teléfono{{$usuario->phone}}</p>
    <p>{{$usuario->role}}</p>
    <p>Tipo(si procede){{$usuario->tipe}}</p>
    <p>
        Best,
        The GESCOMVE team
    </p>
    <hr>
    <p>Por seguridad no le enviamos su cotraseña, para modificarla pulse en Forgot our Password? en el login de la aplicación </p>
    <hr>
    <small>
        Este mensaje va dirigido, de manera exclusiva, a su destinatario y puede contener información confidencial y sujeta al secreto profesional, cuya divulgación no está permitida por Ley. En caso de haber recibido este mensaje por error, le rogamos que de forma inmediata, nos lo comunique mediante correo electrónico remitido a nuestra atención y proceda a su eliminación, así como a la de cualquier documento adjunto al mismo. Asimismo, le comunicamos que la distribución, copia o utilización de este mensaje, o de cualquier documento adjunto al mismo, cualquiera que fuera su finalidad, están prohibidas por la ley. En aras del cumplimiento del Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo, de 27 de abril de 2016, puede ejercer los derechos de acceso, rectificación, cancelación, limitación, oposición y portabilidad de manera gratuita mediante correo electrónico a: __gescomve@gescomve.com_
    </small>

</body>



<style>
   p {
  font: oblique bold 120% cursive;
}
h1 {
  font: oblique bold 120% cursive;
   color: #348cb2
}
</style>


