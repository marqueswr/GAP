function confirmarExclusao(event, solicitanteId){
    event.preventDefault();
     Swal.fire({
         title:'Excluir esse registro ?',
         text:'Tenha certeza, você não pode reverter essa operação',
         icon:'warning',
         showCancelButton: true,
         cancelButtonText:'Cancelar a exclusão',
         confirmButtonColor:'#d33',
         confirmButtonText:'Sim, excluir',
     }).then((result=>{
         if(result.isConfirmed){
             document.getElementById(`formExcluir${solicitanteId}`).submit();
         }
     }))
 }
