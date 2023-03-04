import LucideIcons from './lucide';


export const globalComponents = (app) => {
    for (const [key, icon] of Object.entries(LucideIcons)) {
        app.component(key, icon);
    }
}
