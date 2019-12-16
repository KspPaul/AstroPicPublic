#!/usr/bin/env python3 
#!/usr/bin/python
import json;


tags = '{"tags": ["M 82", "NGC 3034", "M 81", "Bodes nebulae", "NGC 3031"]}';
tags.replace("'","");
js = json.loads(tags);

currrent = str(js['tags']);
c = "";
for x in currrent:
    if x != "'" and x != "[" and x != "]":
        c += x;

print(c);