$(document).ready(function() {
    $('.like-block').on('click', function() {
        console.log('Лайк успешно создан');
        var block = $(this);
        var postId = block.data('post-id');
        var userId = block.data('user-id');
        var isLiked = block.hasClass('liked');

        // Определите URL маршрута для создания или удаления лайка в зависимости от isLiked
        var url = isLiked ? '/delete-like' : '/story-like';

        // Определите метод запроса "POST" для создания или удаления лайка
        var method = isLiked ? 'DELETE' : 'POST';

        // Направьте AJAX-запрос
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            method: method,
            data: {
                post_id: postId,
                user_id: userId,
                likes: 1
            },
            success: function(response) {
                // Тогглите класс "liked" для изменения внешнего вида блока лайка
                block.toggleClass('liked');

                if (isLiked) {
                    console.log('Лайк успешно удален');
                } else {
                    console.log('Лайк успешно создан');
                }
            },
            error: function(error) {
                console.error('Ошибка при взаимодействии с лайком:', error);
            }
        });
    });
});
