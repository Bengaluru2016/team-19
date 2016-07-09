package hemanthreddy.com.jp;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ProgressBar;

import com.daasuu.ahp.AnimateHorizontalProgressBar;
import com.roughike.bottombar.BottomBar;
import com.roughike.bottombar.BottomBarTab;

public class HomeScreen extends AppCompatActivity {
    AnimateHorizontalProgressBar courseStatus;
    BottomBar bottomBar;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_screen);
        bottomBar = BottomBar.attach(this,savedInstanceState);
        courseStatus = (AnimateHorizontalProgressBar) findViewById(R.id.course_status);
        courseStatus.setMaxWithAnim(800);

        bottomBar.setItems(
                new BottomBarTab(R.drawable.ic_media_play,"groups"),
                new BottomBarTab(R.drawable.ic_cast_light,"notifications"),
                new BottomBarTab(R.drawable.ic_cast_dark,"profile")
        );
    }

}
