
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Proyectos
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div style="background-color: white; padding: 28px; border-radius: 10px; border: 1px solid #e5e7eb; box-shadow: 0 2px 5px rgba(0,0,0,0.04);">

                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; margin-bottom: 24px;">

                    <div>
                        <h3 style="font-size: 20px; font-weight: 700; color: #1e293b; margin-bottom: 5px;">
                            Lista de proyectos
                        </h3>

                        <p style="font-size: 14px; color: #64748b;">
                            Consulta y administra tus proyectos.
                        </p>
                    </div>

                    <a href="{{ route('projects.create') }}"
                       style="display: inline-block; padding: 10px 18px; background-color: #16a34a; color: white; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 600;">
                        + Crear proyecto
                    </a>

                </div>

                @if ($projects->isEmpty())

                    <div style="background-color: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px; padding: 35px 20px; text-align: center;">

                        <h4 style="font-size: 17px; font-weight: 600; color: #334155; margin-bottom: 8px;">
                            Todavía no hay proyectos
                        </h4>

                        <p style="font-size: 14px; color: #64748b;">
                            Crea tu primer proyecto para que aparezca en esta lista.
                        </p>

                    </div>

                @else

                    <div style="display: flex; flex-direction: column; gap: 14px;">

                        @foreach ($projects as $project)

                            <div style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; background-color: #ffffff;">

                                <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 10px; margin-bottom: 12px;">

                                    <h4 style="font-size: 17px; font-weight: 700; color: #1e293b;">
                                        {{ $project->title }}
                                    </h4>

                                    @if ($project->status === 'completado')

                                        <span style="display: inline-block; padding: 5px 11px; border-radius: 20px; font-size: 12px; font-weight: 600; background-color: #dcfce7; color: #166534;">
                                            {{ ucfirst($project->status) }}
                                        </span>

                                    @elseif ($project->status === 'en progreso')

                                        <span style="display: inline-block; padding: 5px 11px; border-radius: 20px; font-size: 12px; font-weight: 600; background-color: #dbeafe; color: #1d4ed8;">
                                            {{ ucfirst($project->status) }}
                                        </span>

                                    @else

                                        <span style="display: inline-block; padding: 5px 11px; border-radius: 20px; font-size: 12px; font-weight: 600; background-color: #fef3c7; color: #92400e;">
                                            {{ ucfirst($project->status) }}
                                        </span>

                                    @endif

                                </div>

                                <p style="font-size: 14px; color: #64748b; margin-bottom: 16px;">
                                    {{ $project->description }}
                                </p>

                                <div style="display: flex; flex-wrap: wrap; gap: 20px; padding-top: 12px; border-top: 1px solid #f1f5f9;">

                                    <p style="font-size: 13px; color: #64748b;">
                                        <strong style="color: #475569;">Propietario:</strong>
                                        {{ $project->user->name }}
                                    </p>

                                    <p style="font-size: 13px; color: #64748b;">
                                        <strong style="color: #475569;">Fecha límite:</strong>
                                        {{ $project->due_date }}
                                    </p>

                                </div>

                                <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap; margin-top: 18px;">

                                    <a href="{{ route('projects.show', $project) }}"
                                       style="display: inline-block; padding: 9px 16px; background-color: #2563eb; color: white; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 600;">
                                        Ver detalles
                                    </a>

                                    @if ($project->user_id == auth()->id())

                                        <form method="POST"
                                              action="{{ route('projects.destroy', $project) }}"
                                              onsubmit="return confirm('¿Estás seguro de que quieres eliminar este proyecto?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    style="padding: 9px 16px; background-color: #dc2626; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 13px; font-weight: 600;">
                                                Eliminar
                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>

                @endif

            </div>

        </div>
    </div>
</x-app-layout>

