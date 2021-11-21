Features required:
    Authorization:
        User registration (email, name, password) including email confirmation.
        User password update by authorized user himself.
        Password reset (optional) for users that have the password forgotten.
        User login.
        Creation, update and removal endpoints of the blog should be accessible by the authorized users only. Also, only owners of the posts and comments should be able to update and delete them. While browsing the blog should be available for any user, even unauthenticated.

    Blog engine:
        Post (Should have title, body, likes and comments, creation time)
        Comments (Should belong to posts and are tied to users. Can have body and likes)
        Create post 
        Update post (Update title and body)
        Like post (Post liking should not make page reload. I.e. use Javascript to make likes)

    Blog view engine:
        Display list of posts from latest to oldest with pagination of 25 posts per screen (Displayed in list posts should have full title, creation time, author name, excerpt of body up to 70 characters, like count, like button and button to go to full post)
        List of posts should be able to be filtered by: creation time (latest -> oldest, latest <- oldest, like count (higher -> lower),  specific author)
        Display a single post. I.e. show full post info: title, author name (as a link on which you can press and go to list of posts created by this author), creation time, full body, likes, all comments with their authors.
    DB:
        Seeds should provide a couple of users for the blog app.
        Use migrations for any DB modifications.

    Nice-to-haves (Not required):
        Use wysiwyg for post creation
        Flash messages for displaying messages
        Unit/integration tests
        Caching of the responses
        Admin role
        Live comment section for posts (long pooling or WS)

