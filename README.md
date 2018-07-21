This hotel reservation website based on Laravel framework using PHP programming language, was commission by a hotel, so it is under privacy protection. However, I share you this version1(Sample) including the main functionalities.

You could set up local server using XAMPP or PHPstudy.


To satisfy the technical requirements, Laravel Framework and AJAX were employed and I also added Cross-Site Request Forgery (CSRF) Prevention Sheet to increase the safety of the website’s data. Secondly, the system was validated through three test methods: Laravel Built Test, W3C CSS Validator Website and Black- box testing.

I recognise that some alternatives could have been used in this design such as:
- Manager’s ability to update rom information shown in the Room List Page, is gained through Server Side Rendering, but websocket could have also be used. Websocket is in fact able to update in real time the page information, reduce unnecessary network traffic and latency (Wang et al., 2013).
- Laravel possess some functions that were not used in this assignment as they were not required and therefore were unnecessary. The Lumen Framework could have been adopted as a substitute as it is able to display the convenience and power of Laravel in expense of some configurability aspects (Otwell, Undated).
- At the moment the cache uses the file system caching (File Caching) and its alternative is the Redis cache as it allows a much faster data accessibility and also has a bigger memory storage (Zeng, Li, 2013).
- The frontend and backend interaction can be changed to RESTful that separates backend from frontend and allows modularity. This way backend can manage programs such as app, html5 and hybrid programming (Pautasso et al.,2008).
