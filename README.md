# Picture Spacer
This is a small php script which allows a designer of a website to quickly add
spaceholder image in the right size. Additionally the spacer will have its
dimensions written onto it. This makes it easier to fill the template with actual images later on.

## Usage
The mod rewrite allows use to make images easily and quickly:
By default the page will return a 100px by 100px png.

The syntax is: parts in parentheses are optional
```
<your-url-to-spacer.com>/(<width>/<height>(.<filetype>))
```
Alternate syntax:
```
<your-url-to-spacer.com>/(<width>x<height>(.<filetype>))
```

## Try it now

```
http://spacer.viromania.com/100x100.png
```
![100x100](http://spacer.viromania.com/100x100.png)

```
http://spacer.viromania.com/340x220.png
```
![340x220](http://spacer.viromania.com/340x220.png)

Or as jpeg:
```
http://spacer.viromania.com/200x300.jpg
```
![200x300](http://spacer.viromania.com/200x300.jpg)