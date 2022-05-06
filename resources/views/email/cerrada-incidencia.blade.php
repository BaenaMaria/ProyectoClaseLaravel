<head>
    <h1>GESCOMVE</h1>
    <hr>
</head>
<body>
    <h1>ICIDENCIA {{$ticket->id}} CERRADA</h1>
<article>


   La inicidencia  {{$ticket->id}} del tipo {{$ticket->tipe}} que están afectando a algunos de nuestros usuarios ha cambiado de estado a {{$ticket->status}}.<br>

    Para más información, entre en nuestra aplicación de gescomve en el apartado incidencias y tendrá todos los detalles de la incidencia  {{$ticket->id}}.
    <br>Disculpe las molestias.
<br>
    La fecha de inicio de la incidencia es: {{$ticket->dateIni}}
    La fecha de fin de la incidencia es: {{$ticket->dateEnd}}
</article>

<small>
    Este mensaje va dirigido, de manera exclusiva, a su destinatario y puede contener información confidencial y sujeta al secreto profesional, cuya divulgación no está permitida por Ley. En caso de haber recibido este mensaje por error, le rogamos que de forma inmediata, nos lo comunique mediante correo electrónico remitido a nuestra atención y proceda a su eliminación, así como a la de cualquier documento adjunto al mismo. Asimismo, le comunicamos que la distribución, copia o utilización de este mensaje, o de cualquier documento adjunto al mismo, cualquiera que fuera su finalidad, están prohibidas por la ley. En aras del cumplimiento del Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo, de 27 de abril de 2016, puede ejercer los derechos de acceso, rectificación, cancelación, limitación, oposición y portabilidad de manera gratuita mediante correo electrónico a: __gescomve@gescomve.com_
</small>

<style>
    p  {
   font: oblique bold 120% cursive;
 }
 article{
    font: oblique bold 120% cursive;
 }
 h1 {
   font: oblique bold 120% cursive;
    color: #348cb2
 }
 h2 {
   font: oblique bold 120% cursive;
    color: #348cb2
 }
 </style>
