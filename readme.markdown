#Croogo Lucene Search Plugin

Search plugin for Croogo CMS using Zend_Search_Lucene
---

##Installation and Activation

 - Rename the downloaded folder to 'lucene_search' and place it in your Croogo installation's app/plugins folder.
 - Goto Extensions->Plugins in the admin section.
 - Click 'Activate' next to the "Lucene Search" entry.
---

##Usage

Visit your-app.com/lsearch/your_query (or) submit a form containing your_query in data[Search][query] to plugin:lucene_search/controller:search/action:query

*If it isn't obvious enough, this is just a basic example written without any thought going into it. Modify it to suit your app. You will probably want to remove Croogo's default /search/\* route and use that instead.*
---

##Bugs, Suggestions and Questions

Please send me an email: palaniappanc at gmail.
---

##License

*The distribution contains files from Zend Technologies Ltd. and these come with a separate license (included in the files.) The following license is for files and folders outside the vendors folder only.*

Copyright (c) 2010 Palaniappan Chellappan

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.