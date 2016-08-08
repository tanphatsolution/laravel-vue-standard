<template>
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a v-link="{name:'index'}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a v-link="{name:'user.index'}">
                        <i class="fa fa-user"></i> <span>Người dùng</span>
                    </a>
                </li>
            </ul>
        </section>
    </aside>
</template>
