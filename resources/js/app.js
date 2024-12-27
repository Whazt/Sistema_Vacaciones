
import Swal from 'sweetalert2';
window.Swal = Swal; 

function confirmDelete(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede deshacer.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            // Emitir el evento al componente Livewire
            Livewire.dispatch('delete', {id:id}); 
            Swal.fire('Eliminado', 'El registro ha sido eliminado.', 'success');
        }
    });
}


window.confirmDelete = confirmDelete;
