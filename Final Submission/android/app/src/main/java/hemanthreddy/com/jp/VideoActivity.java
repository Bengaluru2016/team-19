package hemanthreddy.com.jp;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.youtube.player.YouTubeBaseActivity;
import com.google.android.youtube.player.YouTubeInitializationResult;
import com.google.android.youtube.player.YouTubePlayer;
import com.google.android.youtube.player.YouTubePlayerView;

public class VideoActivity   extends YouTubeBaseActivity implements YouTubePlayer.OnInitializedListener, View.OnClickListener {

    String YOUTUBE_VIDEO_CODE = "Nk-WWWD6uCs";
    private static final int RECOVERY_DIALOG_REQUEST = 1;//_oEA18Y8gM0
    private YouTubePlayerView youTubeView;
    TextView t1,t2,m1,m2;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_video);
        Intent intent = this.getIntent();
        if(!TextUtils.isEmpty(intent.getStringExtra("url")))
        {
            m1 = (TextView) findViewById(R.id.textView10);
            m2 = (TextView) findViewById(R.id.textView11);
            YOUTUBE_VIDEO_CODE = intent.getStringExtra("url");
            if(YOUTUBE_VIDEO_CODE != "twGev010Zwc")
            {
                m1.setText("The Story of Agriculture and the Green Economy ");
                m2.setText("Uploaded on Sep 23, 2011\n" +
                        "\n" +
                        "www.farmingfirst.org\n" +
                        "\n" +
                        "The future of our world depends on addressing global challenges now. We need to create sustainable ");
            }
            else
            {
                m1.setText("World Best Motivational Videos for Students ");
                m2.setText("Published on Nov 7, 2014\n" +
                        "\n" +
                        "World Best Videos for Students to Motivate & Inspired ! Watch Real Life Hero Video & Be Strong- Be a Good Man! Hello University Campus School Students Watch this Video & Be Motivate ! Sri Lanka's Best Education Web Site");
            }
        }



        t1 = (TextView) findViewById(R.id.b1);
        t1.setOnClickListener(this);
        t2 = (TextView) findViewById(R.id.b2);
        t2.setOnClickListener(this);
        youTubeView = (YouTubePlayerView) findViewById(R.id.youtube_view);

        // Initializing video player with developer key
        youTubeView.initialize(YoutubeConfig.DEVELOPER_KEY, this);

    }

    @Override
    public void onInitializationSuccess(YouTubePlayer.Provider provider, YouTubePlayer player, boolean b) {
        if (!b) {


            player.setFullscreenControlFlags(YouTubePlayer.FULLSCREEN_FLAG_CONTROL_ORIENTATION);

            //This flag tells the player to automatically enter fullscreen when in landscape. Since we don't have
            //landscape layout for this activity, this is a good way to allow the user rotate the video player.
            player.addFullscreenControlFlag(YouTubePlayer.FULLSCREEN_FLAG_ALWAYS_FULLSCREEN_IN_LANDSCAPE);

            //This flag controls the system UI such as the status and navigation bar, hiding and showing them
            //alongside the player UI
            player.addFullscreenControlFlag(YouTubePlayer.FULLSCREEN_FLAG_CONTROL_SYSTEM_UI);
            // loadVideo() will auto play video
            // Use cueVideo() method, if you don't want to play it automatically
           // player.loadVideo(YoutubeConfig.YOUTUBE_VIDEO_CODE);
            player.setPlayerStateChangeListener(playerStateChangeListener);
            player.setPlaybackEventListener(playbackEventListener);


                player.cueVideo(YOUTUBE_VIDEO_CODE);

            // Hiding player controls

        }
    }
    private YouTubePlayer.PlaybackEventListener playbackEventListener = new YouTubePlayer.PlaybackEventListener() {

        @Override
        public void onBuffering(boolean arg0) {
        }

        @Override
        public void onPaused() {
        }

        @Override
        public void onPlaying() {
        }

        @Override
        public void onSeekTo(int arg0) {
        }

        @Override
        public void onStopped() {
        }

    };
    private YouTubePlayer.PlayerStateChangeListener playerStateChangeListener = new YouTubePlayer.PlayerStateChangeListener() {

        @Override
        public void onAdStarted() {
        }

        @Override
        public void onError(YouTubePlayer.ErrorReason arg0) {
        }

        @Override
        public void onLoaded(String arg0) {
        }

        @Override
        public void onLoading() {
        }

        @Override
        public void onVideoEnded() {
        }

        @Override
        public void onVideoStarted() {
        }
    };

    @Override
    public void onInitializationFailure(YouTubePlayer.Provider provider, YouTubeInitializationResult errorReason) {
        if (errorReason.isUserRecoverableError()) {
            errorReason.getErrorDialog(this, RECOVERY_DIALOG_REQUEST).show();
        } else {
            String errorMessage = errorReason.toString();
            Toast.makeText(this, errorMessage, Toast.LENGTH_LONG).show();
        }
    }
    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (requestCode == RECOVERY_DIALOG_REQUEST) {
            // Retry initialization if user performed a recovery action
            getYouTubePlayerProvider().initialize(YoutubeConfig.DEVELOPER_KEY, this);
        }
    }

    private YouTubePlayer.Provider getYouTubePlayerProvider() {
        return (YouTubePlayerView) findViewById(R.id.youtube_view);
    }

    @Override
    public void onClick(View v) {
        if(v.getId() == R.id.b1)
        {
            YOUTUBE_VIDEO_CODE ="twGev010Zwc";
            //getYouTubePlayerProvider().initialize(YoutubeConfig.DEVELOPER_KEY, this);
            Intent intent = new Intent(this,VideoActivity.class);
            intent.putExtra("url","twGev010Zwc");
            startActivity(intent);
        }
        else
        {
            YOUTUBE_VIDEO_CODE = "Tjnq5StX68g";
            //getYouTubePlayerProvider().initialize(YoutubeConfig.DEVELOPER_KEY, this);
            Intent intent = new Intent(this,VideoActivity.class);
            intent.putExtra("url","Tjnq5StX68g");
            startActivity(intent);
        }
    }
}
