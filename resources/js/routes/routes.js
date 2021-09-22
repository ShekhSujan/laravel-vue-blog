import home from "../components/backend/home";

import newcategory from "../components/backend/category/create";
import editcategory from "../components/backend/category/edit";
import categories from "../components/backend/category/manage";

import newpost from "../components/backend/post/create";
import editpost from "../components/backend/post/edit";
import posts from "../components/backend/post/manage";

//Public
import index from "../components/public/index";
import Category from "../components/public/Category";
import about from "../components/public/about";
import Post from "../components/public/Post";

export const routes = [
    { path: "/home", component: home },

    { path: "/create-category", component: newcategory },
    { path: "/edit-category/:id", component: editcategory },
    { path: "/categories", component: categories },

    { path: "/create-post", component: newpost },
    { path: "/edit-post/:slug", component: editpost },
    { path: "/posts", component: posts },

    // Public Routes
    { path: "/", component: index },
    { path: "/about", component: about },
    { path: "/category/:slug", component: Category },
    { path: "/post/:slug", component: Post }
];
