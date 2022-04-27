<h1>GESCONVE</h1>

                           <h4>Hola usuario: {{$usuario->name}} has sido dado de alta en GESCOMVE para gestionar tu comunicación con la comunidad de vecinos de una manera ráìda y sencilla</h4>
                            <h4>Te adjuntamos tus datos</h4>

                            <p>Nombre:{{$usuario->name}}</p>
                            <p>Email{{$usuario->email}}</p>
                            <p>Teléfono{{$usuario->phone}}</p>
                            <p>{{$usuario->role}}</p>
                            <p>Tipo(si procede){{$usuario->tipe}}</p>

                        <p>Por seguridad no le enviamos su cotraseña, para modificarla pulse en Forgot our Password? en el login de la aplicación </p>



