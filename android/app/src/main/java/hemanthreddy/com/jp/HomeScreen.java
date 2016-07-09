package hemanthreddy.com.jp;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
import android.view.View;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.daasuu.ahp.AnimateHorizontalProgressBar;
import com.roughike.bottombar.BottomBar;
import com.roughike.bottombar.BottomBarTab;

public class HomeScreen extends AppCompatActivity {
    AnimateHorizontalProgressBar courseStatus;
    BottomBar bottomBar;
    TextView view;
    CardView cardView;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_screen);
        view = (TextView) findViewById(R.id.dashboard_course_name);
        courseStatus = (AnimateHorizontalProgressBar) findViewById(R.id.h);
        courseStatus.setMax(1000);
        courseStatus.setProgress(500);
        courseStatus.setAnimateProgressListener(new AnimateHorizontalProgressBar.AnimateProgressListener() {
            @Override
            public void onAnimationStart(int progress, int max) {
                // do nothing
            }

            @Override
            public void onAnimationEnd(int progress, int max) {

            }
        });
        bottomBar = BottomBar.attach(this,savedInstanceState);
        bottomBar.setItems(
                new BottomBarTab(R.drawable.ic_media_play,"groups"),
                new BottomBarTab(R.drawable.ic_cast_light,"notifications"),
                new BottomBarTab(R.drawable.ic_cast_dark,"profile")
        );
        cardView = (CardView) findViewById(R.id.card_view);
        cardView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getApplicationContext(),"course",Toast.LENGTH_SHORT).show();
            }
        });
    }

}
