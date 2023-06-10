<style>
    @import url('https://fonts.cdnfonts.com/css/gagalin');

    .sidebar {
        background: rgba(43, 43, 40, 0.7);
        margin-left: -10px;
        margin-right: -10px;
    }

    .sidebar a {
        display: flex;
        /* Menjadikan elemen a sebagai flex container */
        align-items: center;
        justify-content: center;
        /* Mengatur teks menjadi tengah secara horizontal */
        text-decoration: none;
        font-family: 'Gagalin', sans-serif;
        font-size: 2rem !important;
    }
</style>

<div
    class="sidebar hidden sm:block w-0 sm:w-1/6 bg-gray-200 h-screen shadow fixed top-0 left-0 bottom-0 z-40 overflow-y-auto">
    <div class="mb-6 mt-20 px-6">

        <a href="{{ route('home') }}" class="flex items-center text-white py-2 hover:text-blue-300">
            DASHBOARD
        </a>

        @role('Admin')
            <a href="{{ route('teacher.index') }}" class="flex items-center text-white py-2 hover:text-blue-300">
                TEACHER
            </a>
            <a href="{{ route('subject.index') }}" class="flex items-center text-white py-2 hover:text-blue-300">
                SUBJECTS
            </a>
            <a href="{{ route('classes.index') }}" class="flex items-center text-white py-2 hover:text-blue-300">
                CLASSES
            </a>

            <a href="{{ route('parents.index') }}" class="flex items-center text-white py-2 hover:text-blue-300">
                PARENTS
            </a>
            <a href="{{ route('student.index') }}" class="flex items-center text-white py-2 hover:text-blue-300">
                STUDENT
            </a>
            <a href="{{ route('materi.index') }}" class="flex items-center text-white py-2 hover:text-blue-300">
                PELAJARAN
            </a>
        @endrole
        @role('Teacher')
            <a href="{{ route('materi.index') }}" class="flex items-center text-white py-2 hover:text-blue-300">
                PELAJARAN
            </a>
        @endrole
        @role('Student')
            <a href="{{ route('materi.index') }}" class="flex items-center text-white py-2 hover:text-blue-300">
                PELAJARAN
            </a>
        @endrole
    </div>
</div>
