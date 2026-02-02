<div class="bg-bg min-h-screen">

    <section class="max-w-4xl mx-auto px-4 py-28 text-center">

        <h1 class="text-text text-3xl font-semibold mb-6">
            Contact Us
        </h1>

        <p class="text-text-muted mb-12">
            Have a question or need assistance?  
            Our team is here to help.
        </p>

        {{-- Contact Form --}}
        <form class="max-w-xl mx-auto space-y-6">

            <input type="text"
                   placeholder="Full Name"
                   class="w-full bg-bg border border-border rounded px-4 py-3
                          text-text placeholder:text-text-subtle">

            <input type="email"
                   placeholder="Email Address"
                   class="w-full bg-bg border border-border rounded px-4 py-3
                          text-text placeholder:text-text-subtle">

            <textarea rows="5"
                      placeholder="Your Message"
                      class="w-full bg-bg border border-border rounded px-4 py-3
                             text-text placeholder:text-text-subtle"></textarea>

            <button type="submit"
                    class="w-full px-10 py-3 bg-gold text-black
                           text-sm tracking-wider rounded-full
                           hover:opacity-90 transition">
                Send Message
            </button>

        </form>

    </section>

</div>
