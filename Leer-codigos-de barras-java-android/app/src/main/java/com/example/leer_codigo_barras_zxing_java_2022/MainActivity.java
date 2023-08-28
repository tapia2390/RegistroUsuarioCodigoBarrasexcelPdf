package com.example.leer_codigo_barras_zxing_java_2022;

import androidx.activity.result.ActivityResultLauncher;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.leer_codigo_barras_zxing_java_2022.databinding.ActivityMainBinding;
import com.example.leer_codigo_barras_zxing_java_2022.model.Usuarios;
import com.journeyapps.barcodescanner.CaptureActivity;
import com.journeyapps.barcodescanner.ScanContract;
import com.journeyapps.barcodescanner.ScanOptions;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {

    ActivityMainBinding binding;
    Usuarios usuarios;

    String reciboReplace="";
    public static ArrayList<Usuarios>usuariosArrayList =new ArrayList<>();


    private final ActivityResultLauncher<ScanOptions> barcodeLauncher = registerForActivityResult(new ScanContract(), result -> {
        if (result.getContents() == null) {
            Toast.makeText(this, "CANCELADO", Toast.LENGTH_SHORT).show();
        } else {


            ListarDatos(result.getContents().toString());
        }
    });

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding = ActivityMainBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        binding.btnLeerCodigo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                escanear();
            }
        });

        binding.urlpdf.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
               /] Uri uri = Uri.parse(reciboReplace);
                Intent intent = new Intent(Intent.ACTION_VIEW,uri);
                startActivity(intent);
            }
        });
    }

    public void escanear() {
        ScanOptions options = new ScanOptions();
        options.setDesiredBarcodeFormats(ScanOptions.ALL_CODE_TYPES);
        options.setPrompt("ESCANEAR CODIGO");
        options.setCameraId(0);
        options.setOrientationLocked(false);
        options.setBeepEnabled(false);
        options.setCaptureActivity(CaptureActivityPortrait.class);
        options.setBarcodeImageEnabled(false);

        barcodeLauncher.launch(options);
    }

    public void ListarDatos(String codigo){

        StringRequest request =new StringRequest(Request.Method.POST, "http://192.168.0.2/registro/includes/mostrar_.php?codigo="+codigo,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {


                        usuariosArrayList.clear();
                        try {
                            JSONObject jsonObject =new JSONObject(response);
                            String exito=jsonObject.getString("exito");
                            JSONArray jsonArray =jsonObject.getJSONArray("datos");

                            if (exito.equals("1")){
                                for (int i=0;i<jsonArray.length();i++){
                                    JSONObject object=jsonArray.getJSONObject(i);
                                    String id=object.getString("id");
                                    String nombre=object.getString("nombre");
                                    String correo=object.getString("correo");
                                    String telefono=object.getString("telefono");
                                    String password=object.getString("password");
                                    String fecha=object.getString("fecha");
                                    String rol=object.getString("rol");
                                    String imagen=object.getString("imagen");
                                    String documento=object.getString("documento");
                                    String apellidos=object.getString("apellidos");
                                    String ciudad=object.getString("ciudad");
                                    String departamento=object.getString("departamento");
                                    String direccion=object.getString("direccion");
                                    String empresa=object.getString("empresa");
                                    String estado=object.getString("estado");
                                    String recibo=object.getString("recibo");

                                    usuarios =new Usuarios(id,nombre,correo,telefono,password,fecha,rol,imagen,documento,apellidos,ciudad,departamento,direccion,empresa,estado,recibo);
                                    usuariosArrayList.add(usuarios);

                                    String urlimgreplace= imagen.replace("../", "http://192.168.0.2/registro/");
                                     reciboReplace= recibo.replace("../", "http://192.168.0.2/");

                                    Picasso.with(getApplicationContext()).load(urlimgreplace).placeholder(R.drawable.user12)// Place holder image from drawable folder
                                            .error(R.drawable.user12).resize(110, 110).centerCrop()
                                            .into(binding.imegen);
                                    binding.documento.setText(usuarios.getDocumento());
                                    binding.nombres.setText(usuarios.getNombre());
                                    binding.apellidos.setText(usuarios.getApellidos());
                                    binding.telefono.setText(usuarios.getTelefono());
                                    binding.correo.setText(usuarios.getCorreo());
                                    binding.estado.setText(usuarios.getEstado());
                                    binding.urlpdf.setText(reciboReplace);

                                }
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(MainActivity.this,error.getMessage(),Toast.LENGTH_SHORT).show();
            }
        }
        ){


        };
        RequestQueue requestQueue = Volley.newRequestQueue(MainActivity.this);
        requestQueue.add(request);

    }
}