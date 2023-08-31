<?php
session_start();
//$_SESSION['favorites'] = [];
if (!isset($_SESSION['favorites']))
{
    $_SESSION['favorites'] = [];
}
function is_favorite($id)
{
    return in_array($id, $_SESSION['favorites']);
}
?>
<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            .blog-post{
                margin: auto;
                position: relative;
                width: 70%;
                height: auto;
                border-bottom: 2px solid #666666;
            }

            .blog-post h2{
                display: block;
                margin: 1rem;
            }

            .blog-post p{
                display: block;
                margin: 1rem;
            }

            .blog-post .click-button{
                display: block;
                margin: 1rem;
                padding: .5rem  1rem;
                border-radius: 2rem;
                background-color: #ff6666;
                color: #fff; 
            }
            .click-button span{
                pointer-events: none;
                width: 100%;
                height: 100%;
            }
            .click-button span{
                display: block;
            }
            .click-button span:last-child{
                display: none;
            }
            .cbLike span:first-child{
                display: none;
            }
            .cbLike span:last-child{
                display: block;
            }
            /*           
            */

            .unlike{
                position: absolute;
                right: 2rem;
                width: 2rem;

                height: 2rem; 
            }

            .liked svg{
                position: absolute;
                right: 2rem;
                width: 2rem;

                height: 2rem;
                fill: red;
                color: red;
            } 
        </style>
    </head>
    <body>

        <?php
        // $glue = ',';
        // $pieces = $_SESSION['favorites'];
        //   echo join($glue, $pieces);
        ?>
        <div id="blog-posts">
            <div id="blog-post-1" class="blog-post   <?= is_favorite(1) ? liked : ''; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="unlike ">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>
                <h2>Blog Post 1</h2>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                </p>
                <button  class="click-button  <?= is_favorite(1) ?  cbLike: '' ?>"> 
                    <span>Like</span>
                    <span>UnLike</span>
                </button>
            </div>

            <div id="blog-post-2" class="blog-post  <?= is_favorite(2) ? liked : ''; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="unlike ">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>
                <h2>Blog Post 2</h2>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                </p>
                <button  class="click-button <?= is_favorite(2) ? cbLike: '' ?>">
                    <span>Like</span>
                    <span>UnLike</span>
                </button>
            </div>

            <div id="blog-post-3" class="blog-post  <?= is_favorite(3) ? liked : ''; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="unlike ">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                </svg>

                <h2>Blog Post 3</h2>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                </p>
                <button  class="click-button <?= is_favorite(3) ? cbLike:'' ?>">   
                    <span>Like</span>
                    <span>UnLike</span>
                </button>
                <!--                <button  class="click-button"> </button>-->
            </div>
        </div>
        <script type="text/javascript">
            var cButton = document.querySelectorAll('.click-button');
            function favoriteBlog(blogId = '') {
                var req = new XMLHttpRequest();
                var url = `favorite.php`;
                req.open('POST', url, true);
                //post request
                req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                req.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                req.onload = () => {
                    if (req.readyState === 4 && req.status === 200) {
                        var res = req.responseText;
                        var bId = document.getElementById(blogId);
                        if (res === 'added') {
                            bId.classList.add("liked");


                            bId.children[3].classList.add('cbLike');
                        }
                        if (res === 'removed') {
                            
                            bId.classList.remove("liked");


                            bId.children[3].classList.remove('cbLike');
                        }
                    }

                };

                req.send("id=" + blogId);
            }

            cButton.forEach((cbtn) => {
                cbtn.addEventListener("click", (e) => {
                    blogId = e.target.parentElement.id;
                    favoriteBlog(blogId);
                });
            });

        </script>
    </body>
</html>
