<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Kepala Balai</title>
    @vite('resources/css/app.css')
    <style>
        :root {
            color-scheme: light;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
            margin: 0;
        }

        body {
            background: #eef3f7;
            font-family: Arial, Helvetica, sans-serif;
            overflow: hidden;
        }

        .tv-shell {
            width: 100vw;
            height: 100vh;
            display: grid;
            grid-template-rows: 112px 1fr 72px;
            background:
                radial-gradient(circle at top right, rgba(255, 205, 0, 0.16), transparent 28%),
                linear-gradient(135deg, #f7fafc 0%, #eaf1f6 100%);
            color: #123047;
        }

        .tv-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 28px;
            padding: 18px 42px;
            background: #0f4c75;
            color: white;
            border-bottom: 8px solid #f5c400;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 20px;
            min-width: 0;
        }

        .brand img {
            height: 68px;
            width: auto;
            flex: 0 0 auto;
            background: white;
            border-radius: 10px;
            padding: 4px;
        }

        .brand-copy {
            min-width: 0;
        }

        .brand-kicker {
            margin: 0 0 2px;
            font-size: clamp(16px, 1.25vw, 23px);
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            opacity: 0.86;
        }

        .brand-title {
            margin: 0;
            font-size: clamp(28px, 2.25vw, 44px);
            font-weight: 800;
            line-height: 1;
            white-space: nowrap;
        }

        .header-clock {
            text-align: right;
            flex: 0 0 auto;
        }

        .clock-date {
            font-size: clamp(20px, 1.55vw, 30px);
            font-weight: 700;
            line-height: 1.15;
        }

        .clock-time {
            margin-top: 4px;
            font-size: clamp(24px, 2vw, 38px);
            font-weight: 800;
            letter-spacing: 0.03em;
            line-height: 1;
        }

        .tv-main {
            min-height: 0;
            padding: 30px 42px 26px;
        }

        .agenda-stage {
            height: 100%;
            display: flex;
            align-items: stretch;
            justify-content: center;
        }

        .agenda-card {
            position: relative;
            width: min(100%, 1760px);
            height: 100%;
            display: grid;
            grid-template-columns: minmax(250px, 25%) 1fr;
            overflow: hidden;
            border: 1px solid #d7e2e9;
            border-radius: 26px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 18px 48px rgba(15, 76, 117, 0.12);
        }

        .agenda-meta {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 42px 36px;
            background: #123f5d;
            color: white;
            border-right: 8px solid #f5c400;
        }

        .agenda-status {
            display: inline-flex;
            width: fit-content;
            align-items: center;
            gap: 10px;
            margin-bottom: 28px;
            padding: 10px 16px;
            border-radius: 999px;
            background: #f5c400;
            color: #183247;
            font-size: clamp(16px, 1.2vw, 22px);
            font-weight: 900;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .agenda-status::before {
            content: "";
            width: 11px;
            height: 11px;
            border-radius: 999px;
            background: currentColor;
        }

        .agenda-day {
            margin: 0;
            font-size: clamp(22px, 1.8vw, 34px);
            font-weight: 700;
            line-height: 1.15;
            opacity: 0.9;
        }

        .agenda-date {
            margin: 6px 0 0;
            font-size: clamp(28px, 2.35vw, 46px);
            font-weight: 900;
            line-height: 1.05;
        }

        .agenda-time {
            margin-top: 28px;
            font-size: clamp(56px, 5.2vw, 96px);
            font-weight: 900;
            letter-spacing: -0.03em;
            line-height: 0.95;
        }

        .agenda-time-label {
            margin-top: 10px;
            font-size: clamp(18px, 1.3vw, 24px);
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            opacity: 0.78;
        }

        .agenda-content {
            min-width: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 42px 48px 44px;
        }

        .section-label {
            margin-bottom: 14px;
            color: #567283;
            font-size: clamp(17px, 1.2vw, 23px);
            font-weight: 900;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .activity {
            margin: 0;
            color: #15384f;
            font-size: clamp(34px, 3.1vw, 58px);
            font-weight: 800;
            line-height: 1.16;
            overflow-wrap: anywhere;
            text-wrap: balance;
        }

        .activity.is-long {
            font-size: clamp(30px, 2.55vw, 48px);
            line-height: 1.2;
        }

        .activity.is-very-long {
            font-size: clamp(27px, 2.15vw, 40px);
            line-height: 1.22;
        }

        .location-block {
            display: grid;
            grid-template-columns: 44px minmax(0, 1fr);
            gap: 16px;
            align-items: start;
            margin-top: 34px;
            padding-top: 28px;
            border-top: 2px solid #dce6ec;
        }

        .location-icon {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #e7f1f7;
            color: #0f4c75;
            font-size: 28px;
            font-weight: 900;
        }

        .location-label {
            margin-bottom: 4px;
            color: #6d8594;
            font-size: clamp(16px, 1.1vw, 21px);
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .location-text {
            color: #244b63;
            font-size: clamp(26px, 2vw, 38px);
            font-weight: 700;
            line-height: 1.18;
            overflow-wrap: anywhere;
        }

        .empty-state,
        .error-state {
            width: min(100%, 1200px);
            margin: auto;
            padding: 56px;
            text-align: center;
            border-radius: 26px;
            background: white;
            box-shadow: 0 18px 48px rgba(15, 76, 117, 0.12);
        }

        .empty-state h2,
        .error-state h2 {
            margin: 0 0 14px;
            color: #15384f;
            font-size: clamp(40px, 4vw, 68px);
        }

        .empty-state p,
        .error-state p {
            margin: 0;
            color: #5d7888;
            font-size: clamp(26px, 2.2vw, 38px);
            line-height: 1.35;
        }

        .tv-footer {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: 24px;
            padding: 0 42px;
            background: #ffffff;
            border-top: 1px solid #d8e3ea;
            color: #506b7a;
            font-size: clamp(16px, 1.05vw, 21px);
            font-weight: 700;
        }

        .sync-status {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sync-dot {
            width: 12px;
            height: 12px;
            flex: 0 0 auto;
            border-radius: 999px;
            background: #25a55f;
            box-shadow: 0 0 0 5px rgba(37, 165, 95, 0.12);
        }

        .sync-dot.loading {
            background: #e5a900;
            box-shadow: 0 0 0 5px rgba(229, 169, 0, 0.14);
        }

        .sync-dot.error {
            background: #c83f49;
            box-shadow: 0 0 0 5px rgba(200, 63, 73, 0.14);
        }

        .pager {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            color: #264e65;
            font-size: clamp(18px, 1.2vw, 23px);
            font-weight: 900;
        }

        .pager-dots {
            display: flex;
            gap: 8px;
        }

        .pager-dot {
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: #b8c7d0;
        }

        .pager-dot.active {
            width: 28px;
            background: #0f4c75;
        }

        .footer-updated {
            text-align: right;
        }

        .fade-in {
            animation: fadeIn 420ms ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-aspect-ratio: 4/3) {
            body {
                overflow: auto;
            }

            .tv-shell {
                height: auto;
                min-height: 100vh;
                grid-template-rows: auto 1fr auto;
            }

            .tv-header {
                padding: 16px 22px;
            }

            .tv-main {
                padding: 22px;
            }

            .agenda-card {
                grid-template-columns: 1fr;
                height: auto;
                min-height: 70vh;
            }

            .agenda-meta {
                border-right: 0;
                border-bottom: 6px solid #f5c400;
            }

            .tv-footer {
                grid-template-columns: 1fr;
                gap: 8px;
                padding: 16px 22px;
                text-align: center;
            }

            .sync-status,
            .pager {
                justify-content: center;
            }

            .footer-updated {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <main class="tv-shell">
        <header class="tv-header">
            <div class="brand">
                <img src="{{ asset('assets-tw/img/logo-pu-baru.jpeg') }}" alt="Logo Kementerian PU">
                <div class="brand-copy">
                    <p class="brand-kicker">Balai Wilayah Sungai Bali Penida</p>
                    <h1 class="brand-title">Agenda Kepala Balai</h1>
                </div>
            </div>

            <div class="header-clock" aria-label="Waktu saat ini">
                <div id="clock-date" class="clock-date">-</div>
                <div id="clock-time" class="clock-time">-</div>
            </div>
        </header>

        <section class="tv-main">
            <div id="agenda-stage" class="agenda-stage" aria-live="polite">
                <div class="empty-state">
                    <h2>Memuat agenda...</h2>
                    <p>Data sedang disinkronkan.</p>
                </div>
            </div>
        </section>

        <footer class="tv-footer">
            <div class="sync-status">
                <span id="sync-dot" class="sync-dot loading" aria-hidden="true"></span>
                <span id="sync-text">Menyinkronkan agenda</span>
            </div>

            <div id="pager" class="pager" aria-label="Posisi agenda"></div>

            <div class="footer-updated">
                Diperbarui <span id="last-updated">-</span>
            </div>
        </footer>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ROTATION_MS = 12000;
            const RELOAD_MS = 600000;

            const stage = document.getElementById('agenda-stage');
            const pager = document.getElementById('pager');
            const syncDot = document.getElementById('sync-dot');
            const syncText = document.getElementById('sync-text');
            const lastUpdated = document.getElementById('last-updated');
            const clockDate = document.getElementById('clock-date');
            const clockTime = document.getElementById('clock-time');

            let agendaItems = [];
            let currentIndex = 0;
            let rotationTimer = null;

            function parseDate(dateString) {
                if (!dateString) {
                    return null;
                }

                const date = new Date(dateString + (dateString.length === 10 ? 'T00:00:00' : ''));

                return Number.isNaN(date.getTime()) ? null : date;
            }

            function formatDay(dateString) {
                const date = parseDate(dateString);

                return date
                    ? date.toLocaleDateString('id-ID', { weekday: 'long' })
                    : '-';
            }

            function formatDate(dateString) {
                const date = parseDate(dateString);

                return date
                    ? date.toLocaleDateString('id-ID', {
                        day: '2-digit',
                        month: 'long',
                        year: 'numeric'
                    })
                    : '-';
            }

            function formatTime(timeString) {
                if (!timeString) {
                    return '-';
                }

                return String(timeString).slice(0, 5).replace('.', ':');
            }

            function updateClock() {
                const now = new Date();

                clockDate.textContent = now.toLocaleDateString('id-ID', {
                    weekday: 'long',
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                });

                clockTime.textContent = now.toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false
                }) + ' WITA';
            }

            function getActivityText(item) {
                return item.activity || item.keterangan || item.description || '-';
            }

            function getActivityClass(text) {
                const length = text.length;

                if (length > 420) {
                    return 'activity is-very-long';
                }

                if (length > 220) {
                    return 'activity is-long';
                }

                return 'activity';
            }

            function getStatus(index) {
                return index === 0 ? 'Agenda' : 'Selanjutnya';
            }

            function createAgendaCard(item, index) {
                const card = document.createElement('article');
                card.className = 'agenda-card fade-in';

                const meta = document.createElement('div');
                meta.className = 'agenda-meta';

                const status = document.createElement('div');
                status.className = 'agenda-status';
                status.textContent = getStatus(index);

                const day = document.createElement('p');
                day.className = 'agenda-day';
                day.textContent = formatDay(item.date);

                const date = document.createElement('p');
                date.className = 'agenda-date';
                date.textContent = formatDate(item.date);

                const time = document.createElement('div');
                time.className = 'agenda-time';
                time.textContent = formatTime(item.time);

                const timeLabel = document.createElement('div');
                timeLabel.className = 'agenda-time-label';
                timeLabel.textContent = 'WITA';

                meta.append(status, day, date, time, timeLabel);

                const content = document.createElement('div');
                content.className = 'agenda-content';

                const activityLabel = document.createElement('div');
                activityLabel.className = 'section-label';
                activityLabel.textContent = 'Kegiatan / Keterangan';

                const activityText = getActivityText(item);
                const activity = document.createElement('h2');
                activity.className = getActivityClass(activityText);
                activity.textContent = activityText;

                const locationBlock = document.createElement('div');
                locationBlock.className = 'location-block';

                const locationIcon = document.createElement('div');
                locationIcon.className = 'location-icon';
                locationIcon.textContent = '●';
                locationIcon.setAttribute('aria-hidden', 'true');

                const locationCopy = document.createElement('div');

                const locationLabel = document.createElement('div');
                locationLabel.className = 'location-label';
                locationLabel.textContent = 'Lokasi';

                const location = document.createElement('div');
                location.className = 'location-text';
                location.textContent = item.location || '-';

                locationCopy.append(locationLabel, location);
                locationBlock.append(locationIcon, locationCopy);
                content.append(activityLabel, activity, locationBlock);

                card.append(meta, content);

                return card;
            }

            function renderPager() {
                pager.replaceChildren();

                if (agendaItems.length <= 1) {
                    pager.textContent = agendaItems.length === 1 ? '1 agenda' : '';
                    return;
                }

                const label = document.createElement('span');
                label.textContent = (currentIndex + 1) + ' / ' + agendaItems.length;

                const dots = document.createElement('div');
                dots.className = 'pager-dots';

                const visibleDotCount = Math.min(agendaItems.length, 7);

                for (let i = 0; i < visibleDotCount; i++) {
                    const dot = document.createElement('span');
                    dot.className = 'pager-dot';

                    if (i === currentIndex % visibleDotCount) {
                        dot.classList.add('active');
                    }

                    dots.appendChild(dot);
                }

                pager.append(label, dots);
            }

            function renderCurrentAgenda() {
                stage.replaceChildren();

                if (agendaItems.length === 0) {
                    const empty = document.createElement('div');
                    empty.className = 'empty-state';

                    const title = document.createElement('h2');
                    title.textContent = 'Tidak ada agenda';

                    const description = document.createElement('p');
                    description.textContent = 'Belum ada agenda Kepala Balai yang ditampilkan saat ini.';

                    empty.append(title, description);
                    stage.appendChild(empty);
                    renderPager();

                    return;
                }

                stage.appendChild(createAgendaCard(agendaItems[currentIndex], currentIndex));
                renderPager();
            }

            function restartRotation() {
                if (rotationTimer) {
                    window.clearInterval(rotationTimer);
                }

                if (agendaItems.length <= 1) {
                    return;
                }

                rotationTimer = window.setInterval(function () {
                    currentIndex = (currentIndex + 1) % agendaItems.length;
                    renderCurrentAgenda();
                }, ROTATION_MS);
            }

            function setSyncState(state, text) {
                syncDot.className = 'sync-dot';

                if (state === 'loading') {
                    syncDot.classList.add('loading');
                } else if (state === 'error') {
                    syncDot.classList.add('error');
                }

                syncText.textContent = text;
            }

            function showError() {
                stage.replaceChildren();

                const error = document.createElement('div');
                error.className = 'error-state';

                const title = document.createElement('h2');
                title.textContent = 'Agenda belum dapat dimuat';

                const description = document.createElement('p');
                description.textContent = 'Tampilan akan mencoba menyinkronkan data kembali secara otomatis.';

                error.append(title, description);
                stage.appendChild(error);

                pager.replaceChildren();
            }

            function loadAgendaData() {
                setSyncState('loading', 'Menyinkronkan agenda');

                fetch('/api/agenda', {
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                    .then(function (response) {
                        if (!response.ok) {
                            throw new Error('HTTP ' + response.status);
                        }

                        return response.json();
                    })
                    .then(function (data) {
                        agendaItems = Array.isArray(data) ? data : [];
                        currentIndex = 0;

                        renderCurrentAgenda();
                        restartRotation();

                        const now = new Date();
                        lastUpdated.textContent = now.toLocaleTimeString('id-ID', {
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: false
                        }) + ' WITA';

                        setSyncState('ready', 'Agenda tersinkron');
                    })
                    .catch(function (error) {
                        console.error('Error fetching agenda data:', error);
                        setSyncState('error', 'Gagal menyinkronkan agenda');

                        if (agendaItems.length === 0) {
                            showError();
                        }
                    });
            }

            updateClock();
            window.setInterval(updateClock, 1000);

            loadAgendaData();
            window.setInterval(loadAgendaData, RELOAD_MS);
        });
    </script>
</body>
</html>
