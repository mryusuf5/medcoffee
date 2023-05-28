confirmForm = document.querySelectorAll('.confirmForm');

confirmForm.forEach((e) => {
    e.addEventListener('submit', form => {
        form.preventDefault();
        Swal.fire({
            title: 'Weet je zeker dat je dit wilt verwijderen?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Nee',
            confirmButtonText: 'Ja',
            confirmButtonColor: '#696CFF',
            cancelButtonColor: '#FF3E1D'
        }).then(result => {
            if(result.isConfirmed)
            {
                form.target.submit();
            }
        });
    })
})

var quill = new Quill('#editor', {
    theme: 'snow'
})
