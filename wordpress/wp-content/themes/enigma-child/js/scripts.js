jQuery(function($){
    var vprasalnik_listi = ['vprasalnik_razlicica', 'vprasalnik_starost', 'vprasalnik_zmogljivost', 'vprasalnik_namizje', 'vprasalnik_izbor']; // listi vprasalnika
    var vprasalnik_razvejitev = ['32-bit', 'hitrost', 'prilagodljivost', 'enostavnost']; // gumb naprej naj kaze na konec
    var vprasalnik_indeks = 0;

    function preklopi_list(indeks) {
        // preklopi vidnost lista
        var list = $( 'div#' + vprasalnik_listi[indeks]);
        if (list.css('display') == 'none') {
            list.show();
        } else {
            list.hide();
        }
    }

    function pripravi_izbor(vprasalnik_listi) {
        var distribucije = [];
        var razlicica = $('input:radio[name=' + vprasalnik_listi[0] + ']:checked').val();
        var starost = $('input:radio[name=' + vprasalnik_listi[1] + ']:checked').val();
        var zmogljivost = $('input:radio[name=' + vprasalnik_listi[2] + ']:checked').val();
        var namizje = $('input:radio[name=' + vprasalnik_listi[3] + ']:checked').val();

        if (starost == '32-bit') {
            distribucije = ['lubuntu', 'xubuntu']
        } else if (zmogljivost == 'hitrost') {
            distribucije = ['lubuntu', 'xubuntu', 'ubuntu_mate']
        } else if (namizje == 'enostavnost') {
            distribucije = ['ubuntu', 'ubuntu_gnome']
        } else {
            distribucije = ['kubuntu']
        }

        $.each( distribucije, function( indeks, vrednost ){
            var izbrana_ikona = $( 'div#vprasalnik_izbor img#' + vrednost);
            izbrana_ikona.removeClass('disabled');
            izbrana_ikona.attr('title', izbrana_ikona.attr('title') + ' ' + starost);
            izbrana_ikona.wrap('<a href="/povezave/#' + vrednost + '_' + razlicica + '"></a>');
        });
    }

    $( 'div#vprasalnik_glavno' ).ready(function() {
        $( 'div#vprasalnik_razlicica' ).show();
        $( 'button#vprasalnik_nazaj' ).addClass('disabled');
    });

    $( 'button#vprasalnik_nazaj' ).click(function() {
        if (vprasalnik_indeks == 1) {
            $( 'button#vprasalnik_nazaj').addClass('disabled');
        }
        if (vprasalnik_indeks > 0) {
            preklopi_list(vprasalnik_indeks);
            vprasalnik_indeks--;
            preklopi_list(vprasalnik_indeks);
        }
    });

    $( 'button#vprasalnik_naprej' ).click(function() {
        if (vprasalnik_indeks < vprasalnik_listi.length) {
            // preveri, ce smo na razvejitvi
            preklopi_list(vprasalnik_indeks);
            if (($.inArray($( 'input:radio[name=' + vprasalnik_listi[vprasalnik_indeks] + ']:checked' ).val(), vprasalnik_razvejitev)) > -1) {
                // prisli smo do razvejitve, zato skoci na zadnjo stran
                vprasalnik_indeks = vprasalnik_listi.length - 1;
                $( 'button#vprasalnik_nazaj, button#vprasalnik_naprej' ).hide();
                $( 'button#vprasalnik_znova' ).show();
                pripravi_izbor(vprasalnik_listi);
            } else {
                $( 'button#vprasalnik_nazaj' ).removeClass('disabled');
                vprasalnik_indeks++;
            }
            preklopi_list(vprasalnik_indeks);
        }
    });

    $( 'button#vprasalnik_znova' ).click(function() {
        location.reload();
    });
});