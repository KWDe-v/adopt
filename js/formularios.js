    

    
    /////////////===================TERMOS====================//////////

   function mostrarTermos() {
        var overlay = document.getElementById("overlay-termos");
        overlay.style.display = "block"; 
        setTimeout(function() {
            overlay.classList.add("active"); 
        }, 100);
    }

    function fecharTermos() {
        var overlay = document.getElementById("overlay-termos");
        overlay.classList.remove("active");
        setTimeout(function() {
            overlay.style.display = "none"; 
        }, 50);
    }


    /////////////===================LOGIN====================//////////

    function mostrarFormularioLogin() {
        document.getElementById("overlay-login").style.display = "block";
        var overlay = document.getElementById("overlay-login");
        overlay.style.display = "block"; 
        setTimeout(function() {
            overlay.classList.add("active"); 
        }, 100);
    }

    
    function fecharFormularioLogin() {
        document.getElementById("overlay-login").style.display = "none";
        var overlay = document.getElementById("overlay-login");
        overlay.classList.remove("active");
        setTimeout(function() {
            overlay.style.display = "none"; 
        }, 50);
    }

/////////////===================REGISTRO====================//////////
        
    function mostrarFormularioRegistro() {
        document.getElementById("overlay-registro").style.display = "block";
        var overlay = document.getElementById("overlay-registro");
        overlay.style.display = "block"; 
        setTimeout(function() {
            overlay.classList.add("active"); 
        }, 100);
    }

    
    function fecharFormularioRegistro() {
        document.getElementById("overlay-registro").style.display = "none";
        var overlay = document.getElementById("overlay-registro");
        overlay.classList.remove("active");
        setTimeout(function() {
            overlay.style.display = "none"; 
        }, 50);
    }

/////////////===================RECUPERAÇÃO DE SENHA ====================//////////


    function mostrarFormularioRecuperarSenha() {
        document.getElementById("overlay-recuperarSenha").style.display = "block";
        var overlay = document.getElementById("overlay-recuperarSenha");
        overlay.style.display = "block"; 
        setTimeout(function() {
            overlay.classList.add("active"); 
        }, 100);
    }

    
    function fecharFormularioRecuperarSenha() {
        document.getElementById("overlay-recuperarSenha").style.display = "none";
        var overlay = document.getElementById("overlay-recuperarSenha");
        overlay.classList.remove("active");
        setTimeout(function() {
            overlay.style.display = "none"; 
        }, 50);
    }

/////////////===================ALTERAR SENHA ====================//////////


    function mostrarAlterarSenha() {
        document.getElementById("overlay-AlterarSenha").style.display = "block";
        var overlay = document.getElementById("overlay-AlterarSenha");
        overlay.style.display = "block"; 
        setTimeout(function() {
            overlay.classList.add("active"); 
        }, 100);
    }

    
    function fecharAlterarSenha() {
        document.getElementById("overlay-AlterarSenha").style.display = "none";
        var overlay = document.getElementById("overlay-AlterarSenha");
        overlay.classList.remove("active");
        setTimeout(function() {
            overlay.style.display = "none"; 
        }, 50);
    }


/////////////===================ALTERAR EMAIL ====================//////////


    function mostrarAlterarEmail() {
        document.getElementById("overlay-AlterarEmail").style.display = "block";
        var overlay = document.getElementById("overlay-AlterarEmail");
        overlay.style.display = "block"; 
        setTimeout(function() {
            overlay.classList.add("active"); 
        }, 100);
    }

    
    function fecharAlterarEmail() {
        document.getElementById("overlay-AlterarEmail").style.display = "none";
        var overlay = document.getElementById("overlay-AlterarEmail");
        overlay.classList.remove("active");
        setTimeout(function() {
            overlay.style.display = "none"; 
        }, 50);
    }

/////////////===================ALTERAR TELEFONE ====================//////////


    function mostrarAlterarTelefone() {
        document.getElementById("overlay-AlterarTelefone").style.display = "block";
        var overlay = document.getElementById("overlay-AlterarTelefone");
        overlay.style.display = "block"; 
        setTimeout(function() {
            overlay.classList.add("active"); 
        }, 100);
    }

    
    function fecharAlterarTelefone() {
        document.getElementById("overlay-AlterarTelefone").style.display = "none";
        var overlay = document.getElementById("overlay-AlterarTelefone");
        overlay.classList.remove("active");
        setTimeout(function() {
            overlay.style.display = "none"; 
        }, 50);
    }




    /////////////===================RECUPERAÇÃO DE SENHA====================//////////



var originalButtonText;
$(document).ready(function() {
    $('#formrecuperarSenha').on('submit', function(e) {
        e.preventDefault();
        var $btn = $('#submitrecuperarSenha');
        $btn.prop('disabled', true);
        if (!originalButtonText) {
            originalButtonText = $btn.html();
        }
        $btn.html('<div class="circle" id="circle"></div>');
        $('#circle').show();


        $.ajax({
            type: 'POST',
            url: 'includes/recuperarsenha.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#message-recuperarSenha').html(response);
                
            },
            error: function(xhr, status, error) {
                
                console.error('Erro na requisição', status, error);
            },
            complete: function() {
                $('#circle').hide();
                $btn.html(originalButtonText);
                $btn.prop('disabled', false);
            }
        });
    });
});



    /////////////===================LOGIN====================//////////



var originalButtonText;
$(document).ready(function() {
    $('#formLogin').on('submit', function(e) {
        e.preventDefault();
        var $btn = $('#submitLogin');
        $btn.prop('disabled', true);
        if (!originalButtonText) {
            originalButtonText = $btn.html();
        }
        $btn.html('<div class="circle" id="circle"></div>');
        $('#circle').show();


        $.ajax({
            type: 'POST',
            url: 'includes/entrar.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#message').html(response);
                
            },
            error: function(xhr, status, error) {
                
                console.error('Erro na requisição', status, error);
            },
            complete: function() {
                $('#circle').hide();
                $btn.html(originalButtonText);
                $btn.prop('disabled', false);
            }
        });
    });
});

// ==================  AJAX FORMULARIO DE REGISTRO ================ //

$(document).ready(function() {
    $('#formRegistro').on('submit', function(e) {
        e.preventDefault();
        var $btn = $('#submitRegistro');
        $btn.prop('disabled', true);
        if (!originalButtonText) {
            originalButtonText = $btn.html();
        }
        $btn.html('<div class="circle" id="circle"></div>');
        $('#circle').show();
        $.ajax({
            type: 'POST',
            url: 'includes/registrar.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#message_registro').html(response);
                
            },
            error: function(xhr, status, error) {
                
                console.error('Erro na requisição', status, error);
            },
            complete: function() {
                $('#circle').hide();
                $btn.html(originalButtonText);
                $btn.prop('disabled', false);
            }
        });
    });
});


// ==================  AJAX FORMULARIO DE TROCA DE SENHA ================ //

$(document).ready(function() {

    $('#formTrocarSenha').on('submit', function(e) {
        e.preventDefault();
        var $btn = $('#submitTrocarSenha');
        $btn.prop('disabled', true);
        if (!originalButtonText) {
            originalButtonText = $btn.html();
        }
        $btn.html('<div class="circle" id="circle"></div>');
        $('#circle').show();
        $.ajax({
            type: 'POST',
            url: 'includes/trocarsenha.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#message-TrocarSenha').html(response);
                
            },
            error: function(xhr, status, error) {
                
                console.error('Erro na requisição', status, error);
            },
            complete: function() {
                $('#circle').hide();
                $btn.html(originalButtonText);
                $btn.prop('disabled', false);
            }
        });
    });
});

// ==================  AJAX FORMULARIO DE TROCA DE EMAIL ================ //

$(document).ready(function() {
    $('#formTrocarEmail').on('submit', function(e) {
        e.preventDefault();
        var $btn = $('#submitTrocarEmail');
        $btn.prop('disabled', true);
        if (!originalButtonText) {
            originalButtonText = $btn.html();
        }
        $btn.html('<div class="circle" id="circle"></div>');
        $('#circle').show();
        $.ajax({
            type: 'POST',
            url: 'includes/trocaremail.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#message-TrocarEmail').html(response);
                
            },
            error: function(xhr, status, error) {
                
                console.error('Erro na requisição', status, error);
            },
            complete: function() {
                $('#circle').hide();
                $btn.html(originalButtonText);
                $btn.prop('disabled', false);
            }
        });
    });
});     


function goToPage(event) {
    event.preventDefault();
    const pageNumber = document.getElementById('page-number').value;
    if (pageNumber) {
        const currentUrl = new URL(window.location.href);
        const searchParams = new URLSearchParams(currentUrl.search);
        searchParams.set('page', pageNumber);
        currentUrl.search = searchParams.toString();
        window.location.href = currentUrl.toString();
    }
}

function submitFormFilter(radio) {
    const form = document.getElementById('filterForm');
    const formData = new FormData(form);
    const params = new URLSearchParams(formData).toString();
    fetch(`${window.location.pathname}?${params}`)
    .then(response => response.text())
    .then(data => {
            document.body.innerHTML = data; 
        })
    .catch(error => console.error('Error:', error));
}


function toggleSearchForm() {
    var filterdb = $('.filterdb');
    if (filterdb.is(':hidden')) {
        filterdb.css('display', 'flex').hide().slideToggle(300);
    } else {
        filterdb.slideToggle(300, function() {
            filterdb.css('display', 'none'); 
        });
    }
}