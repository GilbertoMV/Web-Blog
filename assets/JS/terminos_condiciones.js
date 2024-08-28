$('#terminos').on('click', function(){
Swal.fire({
	title: 'Términos y condiciones',
	html: '<br>Ayuda a mantener los comentarios en un ambiente sano.</br>  <br> Siempre comentar con relación al contenido que se trata.</br> <br>Respetar cada opinion o comentario de cada usuario.</br> <br>Toda sección de comentarios está bajo revisión en caso de insultos o palabras indebidas.</br> <br>Permitir el acceso a GAFIA toda información que se le solicite.</br> <br>Toda informacion privada será almacenado solo por fines hacia nuestro blog y no se expondrán al público.</br> <br>Al aceptar los términos, usted está aceptando almacenar sus datos personales.</br>',
	confirmButtonText: '<h3>Acepto</h3> <style> color: #7F8487 </style>',
	backdrop: 'true',
	position: 'center',
	allowOutsideClick: false,
	allowEscapeKey: false,
	allowEnterKey: false,
	stopKeydownPropagation: false,
});
})