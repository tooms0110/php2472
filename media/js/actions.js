    $(document).ready(function(){

        $("#frm_lib").change(function(){
            let txtCode = $("#frm_lib").val();
            let newId = Number($("#frm_id_article").val())+1;
            console.log('Origine : '+txtCode);
            txtCode = txtCode.replace(/-| |\)|\//g, '');
            console.log('Nouveau : '+txtCode);
            if(txtCode.indexOf("(") >=1)
            {
                arr_code = txtCode.split("(");
                str_prefix = arr_code[0];
                if(str_prefix.length<3)
                {
                    str_prefix=str_prefix+'XXX';
                }

                str_prix = arr_code[1]; 
                $("#frm_prix").val(str_prix);
            }
            
            aId = '00'+(newId).toString();
            aId = aId.substr(-3);
            str_nom = str_prefix.substring(0,3);
            $("#frm_code").val(str_nom.toUpperCase()+aId);
        });

        
        $("button").click(function ()
        {
            let idBoutton = this.id;
            var idArticle= idBoutton.replace('btn_del_art', '');
            idArticle = idBoutton.replace('btn_edit_art', '');
            
            let tb = $('#tableArticle tbody');
            idArticle = $(this).closest("tr").find('td:eq(0)').text();
            console.log(idArticle);
            
            let nomB = $(this).closest("tr").find('td:eq(2)').text();
            $("#txt_NomArticle").val(nomB);
            
            //modification article
            if(idBoutton==('btn_edit_art'+idArticle))
            {
                console.log('Edition : '+idBoutton);
                data={action:'edit', id:idArticle};
                $.post("index.php?page=article&action=edit",data,function(data, status){
                    console.log(data);
                    location.href="index.php?page=article&action=edit";
                });
            }

            //suppression article
            if(idBoutton==('btn_del_art'+idArticle))
            {
            
                let info = 'Voulez-vous vraiment supprimer l\'article'+"\n"+idArticle+' - '+nomB;   
                
                $('#txt_confirm').text(info); 

                let del_confirm = confirm(info);
                if(del_confirm==true)
                {
                    data={id:idArticle};
                    $.post("index.php?page=article&action=delete",data,function(data, status){
                    location.reload();
                    });
                }
            }
    
        });

    });
