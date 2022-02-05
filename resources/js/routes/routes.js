//Public
import index from "../components/public/index";
import Category from "../components/public/Category";
import about from "../components/public/about";
import Post from "../components/public/Post";

export const routes = [
    // Public Routes
    { path: "/", component: index },
    { path: "/about", component: about },
    { path: "/category/:slug", component: Category },
    { path: "/post/:slug", component: Post }
];
