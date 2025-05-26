import React from "react";
import MovieCard from "./MovieCard";

const movies = [
  {
    title: "Inception",
    image: "https://image.tmdb.org/t/p/w500/qmDpIHrmpJINaRKAfWQfftjCdyi.jpg",
    description: "A thief who steals corporate secrets through the use of dream-sharing technology."
  },
  {
    title: "Interstellar",
    image: "https://image.tmdb.org/t/p/w500/rAiYTfKGqDCRIIqo664sY9XZIvQ.jpg",
    description: "A team of explorers travel through a wormhole in space in an attempt to ensure humanity's survival."
  }
];

export default function App() {
  return (
    <div className="min-h-screen bg-gray-900 text-white p-8">
      <h1 className="text-4xl font-bold mb-6">Movie Showcase</h1>
      <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
        {movies.map((movie, index) => (
          <MovieCard key={index} movie={movie} />
        ))}
      </div>
    </div>
  );
}
