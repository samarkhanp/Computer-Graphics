#include<conio.h>
#include<graphics.h>
#include<math.h>


void main()
{
  int gd=DETECT,gm;
  initgraph(&gd,&gm,"C:\\TURBOC3\\bgi");
  float x,y,r=100;

  do
  { x+=0.5;
    y=sqrt(r*r-x*x);
    putpixel(320+x,240+y,2);
    putpixel(320+x,240-y,2);
    putpixel(320-x,240+y,2);
    putpixel(320-x,240-y,2);
  }while(x<100);



  getch();
  restorecrtmode();


}





