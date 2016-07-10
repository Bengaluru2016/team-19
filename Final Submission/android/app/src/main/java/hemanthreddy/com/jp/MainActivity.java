package hemanthreddy.com.jp;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    TextView email,password;
    Button login;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        login = (Button) findViewById(R.id.button_login);
        email = (TextView) findViewById(R.id.email);
        password = (TextView) findViewById(R.id.password);
        login.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        if(TextUtils.isEmpty(email.getText()))
            email.setError("email cant be empty");
        if( TextUtils.isEmpty(password.getText()))
            password.setError("password cant be empty");
        Intent intent = new Intent(this,HomeScreen.class);
        startActivity(intent);

    }
}
