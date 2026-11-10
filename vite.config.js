import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/login.css',
                'resources/css/registerEmployer.css',
                'resources/css/jobEditForm.css',
                'resources/css/jobCreate.css',
                'resources/css/popupApplication.css',
                'resources/css/billJobAdd.css',
                'resources/css/jobBillPDF.css',
                'resources/css/applicationIndex.css',
                'resources/css/myApplications.css',
                'resources/css/myBills.css',
            ],
            refresh: true,
        }),
    ],
});
