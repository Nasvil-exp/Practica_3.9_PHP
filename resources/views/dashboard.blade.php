<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de control
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div style="background-color: white; padding: 32px; border-radius: 10px; border: 1px solid #e5e7eb; box-shadow: 0 2px 5px rgba(0,0,0,0.04);">

                <div style="margin-bottom: 28px;">
                    <p style="font-size: 14px; color: #64748b; margin-bottom: 8px;">
                        PANEL DE CONTROL
                    </p>

                    <h3 style="font-size: 26px; font-weight: 700; color: #1e293b; margin-bottom: 10px;">
                        ¡Bienvenido, {{ auth()->user()->name }}!
                    </h3>

                    <p style="font-size: 15px; color: #64748b;">
                        Gestiona tus proyectos y consulta toda su información desde aquí.
                    </p>
                </div>

                <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; margin-bottom: 24px;">
                    <h4 style="font-size: 16px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                        ¿Qué quieres hacer hoy?
                    </h4>

                    <p style="font-size: 14px; color: #64748b;">
                        Accede a tus proyectos o crea uno nuevo para empezar a trabajar.
                    </p>
                </div>

                <div style="display: flex; gap: 12px; flex-wrap: wrap;">

                    <a href="{{ route('projects.index') }}"
                       style="display: inline-block; padding: 11px 20px; background-color: #2563eb; color: white; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 600;">
                        Ver proyectos
                    </a>

                    <a href="{{ route('projects.create') }}"
                       style="display: inline-block; padding: 11px 20px; background-color: #16a34a; color: white; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 600;">
                        + Crear proyecto
                    </a>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>

