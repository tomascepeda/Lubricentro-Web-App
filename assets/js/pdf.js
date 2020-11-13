document.addEventListener("DOMContentLoaded", () => {
    $(function () {
        $('#download').click(function () {
            var options = {
                background: '#fff',
                pagesplit: true
            };
            var pdf = new jsPDF('p', 'pt', 'a2');
            pdf.addHTML($("#pdf"), 15, 15, options, function () {
                pdf.save('lista_productos.pdf');
            });
        });
    });
});