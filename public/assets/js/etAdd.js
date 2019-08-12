$(function () {
    let n = document.getElementsByClassName('eptAdd')['0']
    let count = document.getElementById('etcount').dataset.countadd
    let nh = n.dataset.nh
    let nj = n.dataset.nj
    if (count == 1) {
        $('.eptAdd').on('click', function (event) {
            event.preventDefault()
            idA = '#' + n.dataset.id
            loader = n.dataset.loader
            $(idA).html('<img src="' + loader + '" class="text-center"/>')
            niveau = n.dataset.niveau
            heure = n.dataset.heure
            jour = n.dataset.jour
            type = n.dataset.type
            $(idA).load(Routing.generate('ec_choice', {
                niveau: niveau,
                jour: jour,
                heure: heure
            }))
        })
    } else if (count == 0) {} else {
        for (var i = 0; i < nj; i++) {
            for (var j = 0; j < nj; j++) {
               $('#atat' + i + j).on('click', function (event) {
                    let id = document.getElementById($(this).attr('id'))
                    event.preventDefault()
                    idA = '#' + id.dataset.id
                    loader = id.dataset.loader
                    $(idA).html('<img src="' + loader + '" class="text-center"/>')
                    niveau = id.dataset.niveau
                    heure = id.dataset.heure
                    jour = id.dataset.jour
                    type = n.dataset.type
                    jok = jour
                    hok = heure
                    $(idA).load(Routing.generate('ec_choice', {
                         niveau: niveau,
                        jour: jok,
                        heure: hok
                    }))
                })
            }
        } 
        $('.tatara').on('click', function (event) {
            var list = document.getElementById('ec_choice_ec');
            var valeur = list.options[list.selectedIndex].value;
            event.preventDefault()
            $.post(Routing.generate('ec_choice', {
                niveau: niveau,
                jour : jok,
                heure: hok,
            }),
            {
                'ec_choice[ec]': valeur
            },  function () {
                $(idA).html('<img src="' + loader + '" class="text-center"/>')
                console.log('ok')
                window.location = Routing.generate('add_etemps', {
                    type: type,
                    niveaux: niveau,
                })
            })
        })
    }
});