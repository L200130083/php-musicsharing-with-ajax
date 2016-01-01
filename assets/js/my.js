function is_mobile()//mobile device?
{
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
    {
        return true;
    }
    return false;
}
$(document).ready(function ()
{
    // Local copy of jQuery selectors, for performance.
    var my_jPlayer = $('#jquery_jplayer'),
        my_trackName = $('#jp_container .track-name'),
        my_playState = $('#jp_container .play-state'),
        list = $('.track'),
        current_index = 0,
        my_extraPlayInfo = $('#jp_container .extra-play-info');
    // Some options
    var opt_play_first = true, // If true, will attempt to auto-play the default track on page loads. No effect on mobile devices, like iOS.
        opt_auto_play = true, // If true, when a track is selected, it will auto-play.
        opt_text_playing = 'Now playing', // Text when playing
        opt_text_selected = 'Track selected'; // Text when not playing
    // A flag to capture the first track
    var first_track = true;
    // Change the time format
    $.jPlayer.timeFormat.padMin = true
    $.jPlayer.timeFormat.padSec = true
    $.jPlayer.timeFormat.sepMin = ' Min ';
    $.jPlayer.timeFormat.sepSec = ' Sec';
    // Initialize the play state text
    my_playState.text(opt_text_selected);
    // Instance jPlayer
    my_jPlayer.jPlayer(
    {
        ready: function ()
        {
            $('.track-default').click();
        },
        timeupdate: function (event)
        {
            var progress_number = (parseInt(event.jPlayer.status.currentPercentAbsolute, 10));
            //$('.progress-it').attr('value', progress_number);
            my_extraPlayInfo.text(progress_number + '%');
        },
        play: function (event)
        {
            if (is_mobile() == false)//show bars when not playing in mobile
            {
                $('#bars').show();
            }
            my_playState.text(opt_text_playing);
        },
        pause: function (event)
        {
            $('#bars').hide();
            my_playState.text(opt_text_selected);
        },
        ended: function (event)
        {
            //my_playState.text(opt_text_selected);
            $('#bars').hide();//hide the bars
            my_playState.text(opt_text_playing);
            list = $('.track'); //updating list
            var elementlen = list.length;
            if ((current_index + 2) < elementlen && current_index >= 0)
            {
                var next = list[current_index + 2];
                current_index = current_index + 2;
            }
            else
            {
                var next = list[0];
                current_index = 0;
            };
            $(next).click();
        },
        swfPath: '../jplayer',
        cssSelectorAncestor: '#jp_container',
        supplied: 'mp3',
        wmode: 'window'
    });
    // Create click handlers for the different tracks
    $('.track').click(function (e)
    {
        if (is_mobile() == false)//if not a mobile devices, show the bars
        {
            $('#bars').show();
        }
        my_trackName.text($(this).attr('title'));
        my_jPlayer.jPlayer('setMedia',
        {
            mp3: $(this).attr('href')
        });
        if ((opt_play_first && first_track) || (opt_auto_play && !first_track))
        {
            my_jPlayer.jPlayer('play');
        }
        first_track = false;
        $(this).blur();
        list = $('.track'); //updating list
        current_index = list.index(this); //get current index
        //alert(current_index);
        return false;
    });
    //Nav bar Click
    $('.nav a').on('click', function ()
    {
        $('.nav').find('.active').removeClass('active');
        $(this).parent().addClass('active');
    });
});
