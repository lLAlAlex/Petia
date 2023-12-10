$(() => {
    $('#dropdown-btn').on('click', () => {
        if($('#dropdown-modal').hasClass('hidden')) {
            $('#dropdown-modal').removeClass('hidden');
        } else {
            $('#dropdown-modal').addClass('hidden');
        }
    });

    $('.wishlistBtn').on('click', function() {
        var form = $(this).closest('form');
        form.submit();
    });

    $('#cancelCreateModal').on('click', function () {
        $('#modal-box').removeClass('translate-y-0');
        $('#modal-box').addClass('translate-y-full');
        $('#modal-background').addClass('bg-opacity-0');
        $('#modal-background').addClass('hidden');
    });

    $('#createConversationBtn').on('click', function () {
        $('#modal-box').removeClass('translate-y-full');
        $('#modal-box').addClass('translate-y-0');
        $('#modal-background').removeClass('bg-opacity-0');
        $('#modal-background').removeClass('hidden');
    });

    $('#sendMessageBtn').on('click', function() {
        var form = $(this).closest('form');
        form.submit();
    });

    $('#chatForm input[name="message"]').keypress(function (e) {
        if (e.which === 13 && !e.shiftKey) {
            e.preventDefault();
            $('#chatForm').submit();
        }
    });
})
