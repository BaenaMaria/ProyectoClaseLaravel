@extends('layouts.app')

@section('content')
 <!-- Fonts -->
 <link rel="dns-prefetch" href="//fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

@if (Auth::user()->role == 'administrador')

<!--ADMINISTRADOR-->

<div class="w3-sidebar w3-bar-block"  style="width:23%">
    <nav>
            <ul class="sidebar">
                <li>

                    <i class="fa fa-comments-o"></i>
                    <strong>Opciones del administrador {{Auth::user()->name}}:</strong>
                    <hr>



                </li>

                <li>
                    <a href="">
                        <i class="fa fa-comments-o"></i>
                        <strong>Usuarios</strong>

                    </a>
                    <ul>
                        <li><a href="{{ route('register') }}"><i class="fa fa-globe"></i>Registrar nuevo usuario</a></li>
                        <li><a href="{{ route('usuarios.index') }}"><i class="fa fa-group"></i>Ver lista de usuarios</a></li>
                    </ul>
                </li>

                <li>
                    <a href="">
                        <i class="fa fa-comments-o"></i>
                        <strong>Notificaciones</strong>

                    </a>
                    <ul>
                        <li><a href="{{ route('notificaciones.register') }}"><i class="fa fa-globe"></i>Nueva notificación del administrador</a></li>
                        <li><a href="{{ route('notificaciones.index') }}"><i class="fa fa-group"></i>Ver notificaciones del administrador</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-comments-o"></i>
                        <strong>Tablón de anuncios</strong>

                    </a>
                    <ul>
                        <li><a href="{{ route('tablones.register') }}"><i class="fa fa-globe"></i>Nuevo anuncio</a></li>
                        <li><a href="{{ route('tablones.index') }}"><i class="fa fa-group"></i>Ver anuncios</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-comments-o"></i>
                        <strong>Incidencias</strong>

                    </a>
                    <ul>
                        <li><a href="{{ route('tickets.register') }}"><i class="fa fa-globe"></i>Abrir incidencia</a></li>
                        <li><a href="{{ route('tickets.index') }}"><i class="fa fa-group"></i>Ver incidencias</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
   <!-- Page Content -->
<div style="margin-left:23%">

    <div class="w3-container w3-teal">
      <h1>Dashboard de {{Auth::user()->name}} </h1>
    </div>



    <div class="w3-container">
    <h2>Sidebar Navigation Example</h2>
    <p>The sidebar with is set with "style="width:25%".</p>
    <p>The left margin of the page content is set to the same value.</p>
    </div>

    </div>

    </body>
    </html>
</div>


@endif

<!--USUARIO-->

@if (Auth::user()->tipe == 'usuario')

<div class="w3-sidebar w3-bar-block"  style="width:23%">
    <nav>
            <ul class="sidebar">
                <li>

                    <i class="fa fa-comments-o"></i>
                    <strong>Opciones del usuario {{Auth::user()->name}}:</strong>
                    <hr>



                </li>

                <li>
                    <a href="">
                        <i class="fa fa-comments-o"></i>
                        <strong>Usuarios</strong>

                    </a>
                    <ul>
                        <li><a href="{{ route('usuarios.index') }}"><i class="fa fa-group"></i>Ver lista de usuarios</a></li>
                    </ul>
                </li>

                <li>
                    <a href="">
                        <i class="fa fa-comments-o"></i>
                        <strong>Notificaciones</strong>

                    </a>
                    <ul>
                        <li><a href="{{ route('notificaciones.index') }}"><i class="fa fa-group"></i>Ver notificaciones del administrador</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-comments-o"></i>
                        <strong>Tablón de anuncios</strong>

                    </a>
                    <ul>
                        <li><a href="{{ route('tablones.register') }}"><i class="fa fa-globe"></i>Nuevo anuncio</a></li>
                        <li><a href="{{ route('tablones.index') }}"><i class="fa fa-group"></i>Ver anuncios</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-comments-o"></i>
                        <strong>Incidencias</strong>

                    </a>
                    <ul>
                        <li><a href="{{ route('tickets.register') }}"><i class="fa fa-globe"></i>Abrir incidencia</a></li>
                        <li><a href="{{ route('tickets.index') }}"><i class="fa fa-group"></i>Ver incidencias</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
    <div style="margin-left:23%">

        <div class="w3-container w3-teal">
          <h1> dashboard de {{Auth::user()->name}}:</h1>
        </div>



        <div class="w3-container">
        <h2>Sidebar Navigation Example</h2>
        <p>The sidebar with is set with "style="width:25%".</p>
        <p>The left margin of the page content is set to the same value.</p>
        </div>

        </div>

        </body>
        </html>
    </div>

@endif

<!--OPERARIO-->
@if ((Auth::user()->role == 'operario'))

<div class="w3-sidebar w3-bar-block"  style="width:23%">
    <nav>
            <ul class="sidebar">
                <li>

                    <i class="fa fa-comments-o"></i>
                    <strong>Opciones del usuario {{Auth::user()->name}}:</strong>
                    <hr>



                </li>

                <li>
                    <a href="">
                        <i class="fa fa-comments-o"></i>
                        <strong>Incidencias</strong>

                    </a>
                    <ul>
                        <li><a href="{{ route('tickets.index') }}"><i class="fa fa-group"></i>Ver incidencias</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
    <div style="margin-left:23%">

        <div class="w3-container w3-teal">
          <h1>Dashboard de {{Auth::user()->name}}</h1>
        </div>



        <div class="w3-container">
        <h2>Sidebar Navigation Example</h2>
        <p>The sidebar with is set with "style="width:25%".</p>
        <p>The left margin of the page content is set to the same value.</p>
        </div>

        </div>

        </body>
        </html>
    </div>
@endif

    <style>
        w3-container w3-teal{
            background: #348cb2;
        }
        body {
	background: #EEE;
	overflow-x:hidden;
}
.clearfix:before,
.clearfix:after {
    content: " ";
    display: table;
}

.clearfix:after {
    clear: both;
}
.clearfix {
    *zoom: 1;
}

.w3-sidebar w3-bar-block {
    position: relative;
    margin: 0px auto;
    padding: 50px 0;
    clear: both;

}
@media only screen and (min-width: 1200px) {
    .w3-sidebar w3-bar-block {
        width: 1210px;
    }
}

@media only screen and (min-width: 960px) and (max-width: 1199px) {
    .w3-sidebar w3-bar-block {
        width: 1030px;
    }
}

@media only screen and (min-width: 768px) and (max-width: 959px) {
    .w3-sidebar w3-bar-block {
        width: 682px;
    }
}

@media only screen and (min-width: 480px) and (max-width: 767px) {
    .w3-sidebar w3-bar-block {
        width: 428px;
        margin: 0 auto;
    }
}

@media only screen and (max-width: 479px) {
    .w3-sidebar w3-bar-block {
        width: 320px;
        margin: 0 auto;
    }
}



.sidebar {
  list-style: none;
  padding: 0;
  margin: 0;
  background: #FFF;
  /*height: 100px;*/
  border-radius: 2px;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  font-family: 'Nunito';
  /* == */
  width: 250px;
  /* == */
}
.sidebar li {
  position: relative;
  /*float:left;*/
}
.sidebar li a {
  display: block;
  text-decoration: none;
  padding: 12px 20px;
  color: #777;
  /*text-align: center;
  border-right: 1px solid #E7E7E7;*/

  /* == */
  text-align: left;
  height: 36px;
  position: relative;
  border-bottom: 1px solid #EEE;
  /* == */
}
.sidebar li a i {
  /*display: block;
  font-size: 30px;
  margin-bottom: 10px;*/

  /* == */
  float: left;
  font-size: 20px;
  margin: 0 10px 0 0;
  /* == */

}
/* == */
.sidebar li a p {
  float: left;
  margin: 0 ;
}
/* == */

.sidebar li a strong {
  display: block;
  text-transform: uppercase;
}
.sidebar li a small {
  display: block;
  font-size: 10px;
}

.sidebar li a i, .sidebar li a strong, .sidebar li a small {
  position: relative;

  transition: all 300ms linear;
  -o-transition: all 300ms linear;
  -ms-transition: all 300ms linear;
  -moz-transition: all 300ms linear;
  -webkit-transition: all 300ms linear;
}
.sidebar li:hover > a i {
    opacity: 1;
    -webkit-animation: moveFromTop 300ms ease-in-out;
    -moz-animation: moveFromTop 300ms ease-in-out;
    -ms-animation: moveFromTop 300ms ease-in-out;
    -o-animation: moveFromTop 300ms ease-in-out;
    animation: moveFromTop 300ms ease-in-out;
}
.sidebar li:hover a strong {
    opacity: 1;
    -webkit-animation: moveFromLeft 300ms ease-in-out;
    -moz-animation: moveFromLeft 300ms ease-in-out;
    -ms-animation: moveFromLeft 300ms ease-in-out;
    -o-animation: moveFromLeft 300ms ease-in-out;
    animation: moveFromLeft 300ms ease-in-out;
}
.sidebar li:hover a small {
    opacity: 1;
    -webkit-animation: moveFromRight 300ms ease-in-out;
    -moz-animation: moveFromRight 300ms ease-in-out;
    -ms-animation: moveFromRight 300ms ease-in-out;
    -o-animation: moveFromRight 300ms ease-in-out;
    animation: moveFromRight 300ms ease-in-out;
}

.sidebar li:hover > a {
  color: #348cb2;
}
.sidebar li a.active {
  position: relative;
  color: #348cb2;
  border:0;
  /*border-top: 4px solid #e67e22;
  border-bottom: 4px solid #e67e22;
  margin-top: -4px;*/
  box-shadow: 0 0 5px #DDD;
  -moz-box-shadow: 0 0 5px #DDD;
  -webkit-box-shadow: 0 0 5px #DDD;

  /* == */
  border-left: 4px solid #348cb2;
  border-right: 4px solid #348cb2;
  margin: 0 -4px;
  /* == */
}
.sidebar li a.active:before {
  content: "";
  position: absolute;
  /*top: 0;
  left: 45%;
  border-top: 5px solid #e67e22;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;*/

  /* == */
  top: 42%;
  left: 0;
  border-left: 5px solid #348cb2;
  border-top: 5px solid transparent;
  border-bottom: 5px solid transparent;
  /* == */
}

/* == */
.sidebar li a.active:after {
  content: "";
  position: absolute;
  top: 42%;
  right: 0;
  border-right: 5px solid #348cb2;
  border-top: 5px solid transparent;
  border-bottom: 5px solid transparent;
}
/* == */

@-webkit-keyframes moveFromTop {
    from {
        opacity: 0;
        -webkit-transform: translateY(200%);
        -moz-transform: translateY(200%);
        -ms-transform: translateY(200%);
        -o-transform: translateY(200%);
        transform: translateY(200%);
    }
    to {
        opacity: 1;
        -webkit-transform: translateY(0%);
        -moz-transform: translateY(0%);
        -ms-transform: translateY(0%);
        -o-transform: translateY(0%);
        transform: translateY(0%);
    }
}
@-webkit-keyframes moveFromLeft {
    from {
        opacity: 0;
        -webkit-transform: translateX(200%);
        -moz-transform: translateX(200%);
        -ms-transform: translateX(200%);
        -o-transform: translateX(200%);
        transform: translateX(200%);
    }
    to {
        opacity: 1;
        -webkit-transform: translateX(0%);
        -moz-transform: translateX(0%);
        -ms-transform: translateX(0%);
        -o-transform: translateX(0%);
        transform: translateX(0%);
    }
}
@-webkit-keyframes moveFromRight {
    from {
        opacity: 0;
        -webkit-transform: translateX(-200%);
        -moz-transform: translateX(-200%);
        -ms-transform: translateX(-200%);
        -o-transform: translateX(-200%);
        transform: translateX(-200%);
    }
    to {
        opacity: 1;
        -webkit-transform: translateX(0%);
        -moz-transform: translateX(0%);
        -ms-transform: translateX(0%);
        -o-transform: translateX(0%);
        transform: translateX(0%);
    }
}



.sidebar li ul,
.sidebar li ul li ul {
  position: absolute;
  height: auto;
  min-width: 200px;
  padding: 0;
  margin: 0;
  background: #FFF;
  /*border-top: 4px solid #e67e22;*/
  opacity: 0;
  visibility: hidden;
  transition: all 300ms linear;
  -o-transition: all 300ms linear;
  -ms-transition: all 300ms linear;
  -moz-transition: all 300ms linear;
  -webkit-transition: all 300ms linear;
  /*top: 130px;*/
  z-index: 1000;

  /* == */
  left:280px;
  top: 0px;
  border-left: 4px solid #348cb2;
  /* == */
}
.sidebar li ul:before {
  content: "";
  position: absolute;
  /*top: -8px;
  left: 23%;
  border-bottom: 5px solid #e67e22;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;*/

  /* == */
  top: 25px;
  left: -9px;
  border-right: 5px solid #348cb2;
  border-bottom: 5px solid transparent;
  border-top: 5px solid transparent;
  /* == */
}
.sidebar li:hover > ul,
.sidebar li ul li:hover > ul {
  display: block;
  opacity: 1;
  visibility: visible;
  /*top: 100px;*/

  /* == */
  left:250px;
  /* == */
}
/*.sidebar li ul li {
  float: none;
}*/
.sidebar li ul li a {
  padding: 10px;
  text-align: left;
  border: 0;
  border-bottom: 1px solid #EEE;

  /* == */
  height: auto;
  /* == */
}
.sidebar li ul li a i {
  font-size: 16px;
  display: inline-block;
  margin: 0 10px 0 0;
}
.sidebar li ul li ul {
  left: 230px;
  top: 0;
  border: 0;
  border-left: 4px solid #348cb2;
}
.sidebar li ul li ul:before {
  content: "";
  position: absolute;
  top: 15px;
  /*left: -14px;*/
  /* == */
  left: -9px;
  /* == */
  border-right: 5px solid #348cb2;
  border-bottom: 5px solid transparent;
  border-top: 5px solid transparent;
}
.sidebar li ul li:hover > ul {
  top: 0px;
  left: 200px;
}



/*.sidebar li.float {
  float: right;
}*/
.sidebar li a.search {
  /*padding: 29px 20px 30px 10px;*/
  padding: 10px 10px 15px 10px;
  clear: both;
}
.sidebar li a.search i {
  margin: 0;
  display: inline-block;
  font-size: 18px;
}
.sidebar li a.search input {
  border: 1px solid #EEE;
  padding: 10px;
  background: #FFF;
  outline: none;
  color: #777;

  /* == */
  width:170px;
  float:left;
  /* == */
}
.search-mobile {
	display:none !important;
	background:#348cb2;
	border-left:1px solid #348cb2;
	border-radius:0 3px 3px 0;
}
.search-mobile i {
	color:#FFF;
	margin:0 !important;
}


@media only screen and (min-width: 960px) and (max-width: 1199px) {
    .sidebar {
		margin-left:10px;
	}
}

@media only screen and (min-width: 768px) and (max-width: 959px) {
    .sidebar {
		width: 200px;
	}
	.sidebar li a {
		height:30px;
	}
	.sidebar li a i {
		font-size: 22px;
	}
	.sidebar li a strong {
		font-size: 12px;
	}
	.sidebar li a small {
		font-size: 10px;
	}
	.sidebar li a.search input {
		width: 120px;
		font-size: 12px;
	}
	.sidebar li a.search buton{
		padding: 8px 10px 9px 10px;
	}
	.sidebar li > ul {
		min-width:180px;
	}
	.sidebar li:hover > ul {
		min-width:180px;
		left:200px;
	}
	.sidebar li ul li > ul, .sidebar li ul li ul li > ul {
		min-width:150px;
	}
	.sidebar li ul li:hover > ul {
		left:180px;
		min-width:150px;
	}
	.sidebar li ul li ul li:hover > ul {
		left:150px;
		min-width:150px;
	}
	.sidebar li ul a {
		font-size:12px;
	}
	.sidebar li ul a i {
		font-size:14px;
	}
}

@media only screen and (min-width: 480px) and (max-width: 767px) {

	.sidebar {
		width: 50px;
	}
	.sidebar li a {
		position: relative;
		padding: 12px 16px;
		height:20px;
	}
	.sidebar li a small {
		display: none;
	}
	.sidebar li a strong {
		display: none;
	}
	.sidebar li a:hover strong,.sidebar li a.active strong {
		display:block;
		font-size:10px;
		padding:3px 0;
		position:absolute;
		bottom:0px;
		left:0;
		background:#348cb2;
		color:#FFF;
		min-width:100%;
		text-transform:lowercase;
		font-weight:normal;
		text-align:center;
	}
	.sidebar li .search {
		display: none;
	}

	.sidebar li > ul {
		min-width:180px;
		left:70px;
	}
	.sidebar li:hover > ul {
		min-width:180px;
		left:50px;
	}
	.sidebar li ul li > ul, .sidebar li ul li ul li > ul {
		min-width:150px;
	}
	.sidebar li ul li:hover > ul {
		left:180px;
		min-width:150px;
	}
	.sidebar li ul li ul li > ul {
		left:35px;
		top: 45px;
		border:0;
		border-top:4px solid #348cb2;
	}
	.sidebar li ul li ul li > ul:before {
		left:30px;
		top: -9px;
		border:0;
		border-bottom:5px solid #348cb2;
		border-left:5px solid transparent;
		border-right:5px solid transparent;
	}
	.sidebar li ul li ul li:hover > ul {
		left:30px;
		min-width:150px;
		top: 35px;
	}
	.sidebar li ul a {
		font-size:12px;
	}
	.sidebar li ul a i {
		font-size:14px;
	}

}

@media only screen and (max-width: 479px) {
    .sidebar {
		width: 50px;
	}
	.sidebar li a {
		position: relative;
		padding: 12px 16px;
		height:20px;
	}
	.sidebar li a small {
		display: none;
	}
	.sidebar li a strong {
		display: none;
	}
	.sidebar li a:hover strong,.sidebar li a.active strong {
		display:block;
		font-size:10px;
		padding:3px 0;
		position:absolute;
		bottom:0px;
		left:0;
		background:#348cb2;
		color:#FFF;
		min-width:100%;
		text-transform:lowercase;
		font-weight:normal;
		text-align:center;
	}
	.sidebar li .search {
		display: none;
	}

	.sidebar li > ul {
		min-width:180px;
		left:70px;
	}
	.sidebar li:hover > ul {
		min-width:180px;
		left:50px;
	}
	.sidebar li ul li > ul, .sidebar li ul li ul li > ul {
		min-width:150px;
	}
	.sidebar li ul li:hover > ul {
		left:180px;
		min-width:150px;
	}
	.sidebar li ul li ul li > ul {
		left:35px;
		top: 45px;
		border:0;
		border-top:4px solid #348cb2;
	}
	.sidebar li ul li ul li > ul:before {
		left:30px;
		top: -9px;
		border:0;
		border-bottom:5px solid #348cb2;
		border-left:5px solid transparent;
		border-right:5px solid transparent;
	}
	.sidebar li ul li ul li:hover > ul {
		left:30px;
		min-width:150px;
		top: 35px;
	}
	.sidebar li ul a {
		font-size:12px;
	}
	.sidebar li ul a i {
		font-size:14px;
	}

}

    </style>



@endsection
