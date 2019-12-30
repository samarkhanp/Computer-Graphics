import 'package:flutter/material.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatefulWidget {
  State<StatefulWidget> createState() {
    return _MyAppState();
  }
}

class _MyAppState extends State<MyApp> {
  String mytxt = "";
  Widget build(BuildContext context) {
    return (MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('DHIRU APP'),
          centerTitle: true,
        ),
        body: Center(
          child: Column(
            children: <Widget>[
              TextField(
              onChanged: (String value){ 
                setState((){ mytxt=value;});
                }),
              
              SizedBox( height: 40,),
              
              Text(
                mytxt,
                style: TextStyle(
                  fontWeight: FontWeight.bold,
                  color: Colors.blue,
                  fontSize: 36,
                ),
              )
            ],
          ),
        ),
      ),
      debugShowCheckedModeBanner: false,
    ));
  }
}
