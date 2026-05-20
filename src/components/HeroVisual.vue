<template>
  <div class="hero-visual-root relative w-full min-w-0" aria-label="Campus UEA — sede do ProEnSP">

    <div class="relative overflow-visible">
      <div
        class="hero-campus-frame relative overflow-hidden rounded-2xl shadow-[0_24px_56px_rgba(15,108,119,0.22)] ring-1 ring-primary/10"
      >
        <!-- ── Foto principal: fachada UEA ── -->
        <img
          src="/img/frente_uea.jpeg"
          alt="Fachada do Campus da Escola Superior de Ciências da Saúde — UEA"
          class="hero-campus-photo block w-full object-cover object-center"
          loading="eager"
          fetchpriority="high"
          decoding="async"
          draggable="false"
        />

        <!-- Fade lateral esquerdo (blends with page bg) -->
        <div
          class="pointer-events-none absolute inset-y-0 left-0 w-[28%] max-w-[9rem] bg-gradient-to-r from-[#f0f9fb] via-[#f0f9fb]/85 to-transparent sm:max-w-[11rem] lg:w-[32%] lg:max-w-[13rem]"
          aria-hidden="true"
        />
        <!-- Fade inferior suave -->
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-[#0a6878]/35 via-transparent to-transparent" aria-hidden="true" />
        <!-- Linha de brilho inferior -->
        <div class="pointer-events-none absolute bottom-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-primary/70 to-transparent" aria-hidden="true" />

        <!-- ── Card "ProEnSP dentro da UEA" (bottom-left) ── -->
        <div
          class="proensp-card absolute bottom-4 left-4 z-10 overflow-hidden rounded-xl shadow-[0_8px_28px_rgba(0,0,0,0.38)] ring-2 ring-white/60 sm:bottom-5 sm:left-5 lg:bottom-6 lg:left-6"
        >
          <img
            src="/img/logo_parede.jpeg"
            alt="Logo ProEnSP na parede do programa dentro da UEA"
            class="proensp-photo block w-full object-cover object-center"
            draggable="false"
          />
          <!-- Overlay escuro gradiente no card -->
          <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/65 via-black/10 to-transparent" aria-hidden="true" />
          <!-- Label do card -->
          <div class="absolute inset-x-0 bottom-0 px-2.5 pb-2 pt-4">
            <p class="text-[10px] font-bold uppercase tracking-widest text-teal-300 leading-none">ProEnSP</p>
            <p class="mt-0.5 text-[9.5px] font-medium leading-tight text-white/80">Localizado no campus UEA-ESA</p>
          </div>
        </div>

        <!-- ── Badge de conexão entre as fotos ── -->
        <div
          class="absolute bottom-4 left-[calc(var(--card-w)+1.25rem)] z-20 flex items-center gap-1.5 rounded-full border border-white/40 bg-white/90 px-2.5 py-1 shadow-lg backdrop-blur-md sm:bottom-5"
          aria-hidden="true"
        >
          <span class="flex h-2 w-2 shrink-0 items-center justify-center">
            <span class="absolute inline-flex h-2 w-2 animate-ping rounded-full bg-primary opacity-60" />
            <span class="relative inline-flex h-1.5 w-1.5 rounded-full bg-primary" />
          </span>
          <span class="whitespace-nowrap text-[10px] font-semibold text-primary">dentro do campus UEA</span>
        </div>

      </div>

      <!-- Blobs de luz ambiente -->
      <div class="pointer-events-none absolute -bottom-8 -left-8 h-40 w-40 rounded-full bg-[#9ad06d]/30 blur-3xl" aria-hidden="true" />
      <div class="pointer-events-none absolute -right-6 top-1/2 h-48 w-48 -translate-y-1/2 rounded-full bg-primary/15 blur-3xl" aria-hidden="true" />
    </div>

  </div>
</template>

<script setup lang="ts">
</script>

<style scoped>
.hero-visual-root {
  max-width: 100%;
  /* largura do card ProEnSP para cálculo do badge */
  --card-w: 9rem;
}

.hero-campus-frame {
  width: 100%;
  max-width: 100%;
}

.hero-campus-photo {
  aspect-ratio: 16 / 9;
  height: auto;
  width: 100%;
  max-width: 100%;
}

/* Card ProEnSP */
.proensp-card {
  width: var(--card-w);
}

.proensp-photo {
  aspect-ratio: 4 / 3;
}

@media (min-width: 640px) {
  .hero-visual-root {
    --card-w: 10.5rem;
  }

  .hero-campus-photo {
    max-height: clamp(19.5rem, 57vw, 25.5rem);
  }
}

@media (min-width: 1024px) {
  .hero-visual-root {
    --card-w: 12rem;
  }

  .hero-campus-photo {
    max-height: clamp(24.5rem, 39vw, 31rem);
  }
}

@media (min-width: 1280px) {
  .hero-visual-root {
    --card-w: 13.5rem;
  }

  .hero-campus-photo {
    max-height: clamp(26rem, 36vw, 33rem);
  }
}
</style>
