<script src="<?= __JS__.'datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?= __JS__.'datatables/dataTables.bootstrap.min.js'; ?>"></script>
<script src="<?= __JS__.'datatables/dataTables.buttons.min.js'; ?>"></script>
<script src="<?= __JS__.'datatables/buttons.bootstrap.min.js'; ?>"></script>
<script src="<?= __JS__.'datatables/jszip.min.js'; ?>"></script>
<script src="<?= __JS__.'datatables/buttons.html5.min.js'; ?>"></script>
<script src="<?= __JS__.'datatables/buttons.colVis.min.js'; ?>"></script>
<script>
    $(function(){
        // Setup - add a text input to each footer cell
        $('.table-to-datatables tfoot th').each(function(i){
            if (i == $('.table-to-datatables tfoot th').length-1) {
                return false;
            }
            var title = $(this).text()
            $(this).html('<input type="text" placeholder="PROCURE '+title+'" />')
        })

        // data tables
        var count = $('.table-to-datatables').find('tr:first th').length
        var columns = []
        for (i=1;i<count-1;i++){
            columns.push(i)
        }
        var scrollX = (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4)));
        var responsive = !scrollX;
        var table = $('.table-to-datatables').DataTable({
            ajax: $('.table-to-datatables').attr('data-ajax'),
            responsive: responsive,
            scrollX: scrollX,
            // responsive: true,
            // scrollX: true,
            language: {
                // decimal: '',
                emptyTable: 'Sem resultados',
                info: 'Exibindo _START_ até _END_ de _TOTAL_ registros',
                infoEmpty: 'Exibindo 0 até 0 de 0 registros',
                infoFiltered: '(filtrado de _MAX_ total registros)',
                infoPostFix: '',
                thousands: '',
                lengthMenu: 'Exibindo _MENU_ registros',
                loadingRecords: 'Carregando...',
                processing: 'Processando...',
                search: 'Procure:',
                zeroRecords: 'Nenhum registro encontrado',
                paginate: {
                    first: 'Primeiro',
                    last: 'Último',
                    next: 'Próximo',
                    previous: 'Anterior',
                },
                'aria': {
                    sortAscending: ': ordem ascendente',
                    sortDescending: ': ordem descendente',
                },
                buttons:{colvisRestore:'RESTAURAR VISIBILIDADE',},
            },
            dom: 'Bfltip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'XLSX',
                    filename: '<?= Utils::getController(); ?>',
                    sheetName: 'lista',
                    className: 'btn-primary',
                    exportOptions: {
                        columns: ':visible :not(:last-child)',
                    },
                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml']
                        $('row:first c', sheet).attr('s', '42')
                    },
                },
                {
                    extend: 'excelHtml5',
                    text: 'LISTA ATUAL XLSX',
                    filename: '<?= Utils::getController(); ?>',
                    sheetName: 'lista',
                    className: 'btn-primary',
                    exportOptions: {
                        columns: ':visible :not(:last-child)',
                        modifier: {
                            page: 'current',
                        },
                    },
                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml']
                        $('row:first c', sheet).attr('s', '42')
                    },
                },
                {
                    extend: 'colvis',
                    text: 'SELECIONE AS COLUNAS',
                    className: 'btn-primary',
                    postfixButtons: ['colvisRestore'],
                    columns: columns,
                },
            ],
            columnDefs: [
                {
                    orderable: false,
                    targets: -1,
                },
            ],
        })

        // Apply the search
        table.columns().every(function(){
            var that = this
            $('input',this.footer()).on('keyup change', function(){
                if (that.search() !== this.value) {
                    that.search(this.value).draw()
                }
            })
        })

        // for buttons: add, edit and delete
        $(document).on('click','.btn-crud',function (event) {
            var title = $(this).attr('data-title')
            var url = $(this).attr('data-url')
            var data = (typeof($(this).attr('data-id')) == 'undefined') ? {} : {id:$(this).attr('data-id')}
            var modal = $('#modal-crud')
            $.ajax({
                url: url,
                method: 'post',
                data: data,
                success: function (result) {
                    modal.find('.modal-body').html(result)
                    modal.find('.modal-title').html(title)
                    modal.modal('show')
                    modal.find('form').on('submit',function(event){
                        event.preventDefault()
                        $.ajax({
                            url: url,
                            method: 'post',
                            data: modal.find('form').serialize(),
                            success: function (result) {
                                modal.modal('hide')
                                var json = $.parseJSON(result)
                                var content = ''
                                content += '<div class="container-fluid">'
                                content += '<div id="alert" class="alert alert-'+json[0]+' alert-dismissible" role="alert" style="display: none;">'
                                content += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                                content += '<span aria-hidden="true">&times;</span>'
                                content += '</button>'
                                content += '<strong>'+json[1]+'</strong>'
                                content += '</div>'
                                content += '</div>'
                                $('#container-alert').html(content)
                                $('#alert').fadeIn(2000).parent().delay(7000).slideUp(500)
                                table.ajax.reload()
                            }
                        })
                    })
                }
            })
        })

    })
</script>
