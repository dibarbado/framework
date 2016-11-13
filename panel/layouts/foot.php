<script src="<?= __JS__.'jquery.min.js'; ?>"></script>
<script src="<?= __JS__.'bootstrap/bootstrap.min.js'; ?>"></script>
<script>
    $(function(){
        // alert messages
        $('#alert').fadeIn(2000).delay(3000).slideUp(1000)

        // delete modal
        $('.form-delete').on('submit',function(event){
            event.preventDefault()
            var index = $('.form-delete').index(this)
            var modal = $('#confirm-delete').modal('show')
            modal.on('click','.btn-delete',function(){
                $('.form-delete')[index].submit()
            })
        })

        // initialize tooltip
        $('.validate-tooltip').tooltip({title:'preencha esse campo!',trigger:'manual'})
        
        // validate all inputs on submit
        $('button[type="submit"]').on('click',function(event){
            $(this).parent().find('.validate-tooltip').each(function(){
                if ($(this).val()=='') {
                    $(this).tooltip('show')
                    event.preventDefault()
                }
            })
        })

        // authentication
        $('#btn-create-new-account').on('click',function(){
            $('#div-create-new-account').css('display','block')
            $('#div-do-login').css('display','none')
        })
        $('#btn-do-login').on('click',function(){
            $('#div-do-login').css('display','block')
            $('#div-create-new-account').css('display','none')
        })

    })
</script>
