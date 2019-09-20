$(function(){
    let count = document.getElementById('idCount').dataset.countadd
    if(count == 1)
    {
        $('.noteAdd').on('click',function(event)
           {
               let id = document.getElementsByClassName('noteAdd')['0']
               event.preventDefault()
               idA ='#'+id.dataset.id
               loader = id.dataset.loader
               $(idA).html('<img src="'+loader+'" class="text-center"/>')
               etudiant = id.dataset.etudiant
               ec = id.dataset.ec
               semestre = id.dataset.semestre
               niveau = id.dataset.niveau
               au = id.dataset.au
               ratrapage = id.dataset.ratrapage
               type = id.dataset.type
           
               $(idA).load(Routing.generate('note_ajoute_formulaire',{
                   etudiant : etudiant,
                   ec : ec,
                   semestre : semestre,
                   niveau : niveau,
                   au : au,
                   ratrapage : ratrapage
               }))
           })
    }
    else if (count==0)
    {
    }
    else
    {
        let nbrEc = document.getElementsByClassName('noteAdd')['0'].dataset.nbrec
        let nbrEt = document.getElementsByClassName('noteAdd')['0'].dataset.nbret
        for(var i=0 ; i<nbrEc ; i++)
        {
            for(var j=0 ; j<nbrEc ; j++)
            {
                $('#a'+i+j).on('click',function(event)
                {
                    let id = document.getElementById($(this).attr('id'))
                    event.preventDefault()
                    idA ='#'+id.dataset.id
                    loader = id.dataset.loader
                    $(idA).html('<img src="'+loader+'" class="text-center"/>')
                    etudiant = id.dataset.etudiant
                    ec = id.dataset.ec
                    semestre = id.dataset.semestre
                    niveau = id.dataset.niveau
                    au = id.dataset.au
                    ratrapage = id.dataset.ratrapage
                    type = id.dataset.type
                
                    $(idA).load(Routing.generate('note_ajoute_formulaire',{
                        etudiant : etudiant,
                        ec : ec,
                        semestre : semestre,
                        niveau : niveau,
                        au : au,
                        ratrapage : ratrapage
                    }))
                })
            }
        }
    }

    $('.tatara').on('click',function(event)
       {
           event.preventDefault()
           var valeur = $('#note_valeur').val()
           if( valeur<0 || valeur>20 )
           {
               alert('entré une valeur entre 0 et 20')
               $(':input')
                   .not(':button, :submit, :reset, :hidden')
                   .val('')
           }
           else
           {
           $.post(Routing.generate('note_ajoute_formulaire',{
               etudiant : etudiant,
               ec : ec,
               semestre : semestre,
               niveau : niveau,
               au : au,
               ratrapage : ratrapage
           }), 
           {'note[valeur]':valeur}, function() {
               $(idA).html('<img src="'+loader+'" class="text-center"/>')
               window.location = Routing.generate('note_ajoute',{
                   type : type,
                   semestre : semestre,
                   niveaux : niveau,
                   au : au,
                   ratrapage : ratrapage
               }
               )
           })
           }
       })
});