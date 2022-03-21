$(document).ready(function () {
    $('#add-video').on('click', function (e) {
    const index = + $('#video-counter').val();
    const tmpl = $('.videos').data('prototype').replace(/__name__/g, index);
    console.log(tmpl);
    $('#video-counter').val(index+1);
    $('#videos').append(tmpl);
    });
    $('#add-picture').on('click', function (e) {
    const index = + $('#picture-counter').val();
    const tmpl = $('.pictures').data('prototype').replace(/__name__/g, index);
    console.log(tmpl);
    $('#picture-counter').val(index+1);
    $('#pictures').append(tmpl);
    });
    });