# JS中的坑

1. ##### 变量提升，JavaScript引擎先解析代码】，然后获取所有被声明的变量，然后在一行一行的运行，定义变量。然后导致定义的代码提升到了头部；

   ````javascript
   console.log(a);
   var a=1;
   ````

   相当于

   ````javascript
   var a;
   console.log(a);
   a=1;
   //显示值为undefined
   ````

2. ##### 在switch语句中，比较是采用“严格相等运算符(===)”来比较的。

   ````javascript
   var x=1;
   
   switch (x){
       case true:
           console.log('x发生了数据类型的转换');
           break;
       default:
           console.log('xmy发生数据类型的转换');
   }
   ````

3. JS在对小数计算时，计算得到的数值不是精确的值。

4. null是object
   function是function



inline-block 多 4 px 像素问题