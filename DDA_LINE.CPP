#include<conio.h>
#include<graphics.h>
#include<math.h>

#define round(a) ((int)(a+0.5))
void main()
{
  int gd=VGA,gm=VGAHI;
  initgraph(&gd,&gm,"C:\\TURBOC3\\bgi");
  int dx,dy,steps,x1,x2,y1,y2;
  float x,y,xinc,yinc;
  x1=100,y1=100,x2=500,y2=105;

  dx=x2-x1;
  dy=y2-y1;

  if(abs(dx) > abs(dy)) steps=abs(dx);
  else steps=abs(dy);

  xinc=(float)dx/steps;
  yinc=(float)dy/steps;

  x=x1;y=y1;
  putpixel(x,y,7);
  for(int i=1;i<steps;i++)
  {
     x=x+xinc;
     y=y+yinc;

     putpixel(round(x),round(y),7);

  }

  getch();
  restorecrtmode();


}





