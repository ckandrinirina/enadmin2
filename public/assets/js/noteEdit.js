$(function(){
    let count = document.getElementById('idCount').dataset.countdel
    if(count == 1)
    {
        // $('.noteEdit').on('click',function(event)
        //    {
        //        let id = document.getElementsByClassName('noteEdit')['0']
        //        event.preventDefault()
        //        idA ='#'+id.dataset.id
        //        loader = id.dataset.loader
        //        $(idA).html('<img src="'+loader+'" class="text-center"/>')
        //        etudiant = id.dataset.etudiant
        //        ec = id.dataset.ec
        //        semestre = id.dataset.semestre
        //        niveau = id.dataset.niveau
        //        au = id.dataset.au
        //        ratrapage = id.dataset.ratrapage
        //        type = id.dataset.type
        //        valeur = id.dataset.valeur
        //        $(idA).load(Routing.generate('editNote',{
        //            etudiant : etudiant,
        //            ec : ec,
        //            semestre : semestre,
        //            niveau : niveau,
        //            au : au,
        //            ratrapage : ratrapage,
        //            valeur : valeur
        //        }))
        //    })
    }
    else if (count==0)
    {
    }
    else
    {
        let nbrEc = document.getElementsByClassName('noteEdit')['0'].dataset.nbrec
        let nbrEt = document.getElementsByClassName('noteEdit')['0'].dataset.nbret
        for(var i=0 ; i<nbrEc ; i++)
        {
            for(var j=0 ; j<nbrEc ; j++)
            {
                $('#e'+i+j).on('click',function(event)
                {
                    var edit = 1
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
                    valeur = id.dataset.valeur
                
                    $(idA).load(Routing.generate('editNote',{
                        etudiant : etudiant,
                        ec : ec,
                        semestre : semestre,
                        niveau : niveau,
                        au : au,
                        ratrapage : ratrapage,
                        valeur : valeur,
                        edit : edit
                    }))
                })
            }
        }
    }
});