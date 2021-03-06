package hemanthreddy.com.jp;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
import android.view.View;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.daasuu.ahp.AnimateHorizontalProgressBar;
import com.roughike.bottombar.BottomBar;
import com.roughike.bottombar.BottomBarBadge;
import com.roughike.bottombar.BottomBarTab;
import com.roughike.bottombar.OnTabSelectedListener;

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
        courseStatus.setProgress(233);
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
                new BottomBarTab(R.drawable.ic_cast_light,"Dashboard"),
                new BottomBarTab(R.mipmap.ic_action_appointment_reminders_242,"notifications"),
                new BottomBarTab(R.mipmap.ic_action_profile,"profile")
        );
        BottomBarBadge message = bottomBar.makeBadgeForTabAt(1,"red",10);
        message.show();
        bottomBar.setOnItemSelectedListener(new OnTabSelectedListener() {
            @Override
            public void onItemSelected(int position) {
                Toast.makeText(getApplicationContext(),""+position, Toast.LENGTH_LONG).show();
             if(position == 2)
             {
                 Intent intent = new Intent(getApplicationContext(),Profile.class);
                 startActivity(intent);
             }
                else if(position == 1)
             {
                 Intent intent = new Intent(getApplicationContext(),Notifications.class);
                 startActivity(intent);
             }
            }
        });
        cardView = (CardView) findViewById(R.id.card_view);
        cardView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getApplicationContext(),"course",Toast.LENGTH_SHORT).show();
                Intent intent = new Intent(getApplicationContext(),VideoActivity.class);
                startActivity(intent);
            }
        });
    }

}
