
$('#eliminar').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

        Swal.fire({
            html: '<style> .title{font-size:20px; font-family:Arial; color:#ffffff;} .content{font-size:15px; font-family:Arial; color:#D3D3D3;} </style> <h1 class="title">¿Seguro que desea eliminar este artículo?</h1><br> <h1 class="content">Al eliminar este articulo ya no podrá recuperarse</h1>',
            grow:'row',
            text: "No podrás revertir esta acción",
            icon: 'warning',
            background:'#343434',
            color:'#ffffff',
            showCancelButton: true,
            confirmButtonColor: '#48C341',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminalo',
            cancelButtonText: 'Cancelar',
            allowEnterKey: false,
            allowEscapeKey: false,
            allowOutsideClick: false,
          }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
          });
    });

  $('#publicar').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
    
            Swal.fire({
                position: 'center',
                grow:'row',
                html: '<style> .title{font-size:20px; font-family:Arial; color:#ffffff;} .content{font-size:15px; font-family:Arial; color:#D3D3D3;} </style> <h1 class="title">¿Seguro que desea publicar este artículo?</h1><br> <h1 class="content">Al publicar este articulo los usuarios podrán visualizarlo</h1>',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#48C341',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí,Publicar',
                cancelButtonText: 'Cancelar',
                background:'#343434',
                color:'#ffffff',
                allowEnterKey: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
              }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
              });
        });
        
function comentarios() {
    Swal.fire({
    icon: 'error',
    html: '<style> .title{font-size:15px; font-family:Arial; text-align: center;}</style> <span class="title"><b>Inicia sesión para comentar<b></span>',
    background: '#343434',
    color: '#ffffff',
    footer: '<style>.a{font-family:Arial;} a{color:white;}</style><h2 class="a"><a href="login.php">Iniciar Sesión</a></h2>',
    allowEnterKey: false,
    allowEscapeKey: false,
    allowOutsideClick: false,
    timer: 4000,
    showConfirmButton: false,
});
}














