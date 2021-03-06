// This is array of obejects with array of objects
//
//  in bullet point form, it looks like this:
//  College
//  * COT - College of Tech.
//    Courses:
//       * BSIT - Bachelor of Science ...
//       * BSEMC - ....
//  * COB - College of Business
//    Courses:
//       * BSA - Bachelor of Science in Accountancy
//       * BSHM - Bachelor of Science in Hospitality Management

export const COLLEGES = [
  {
    id: 'COA',
    college: 'College of Administration',
    courses: [
      {
        id: 'BPA',
        course: 'BP Administration major in Local Goverance',
      },
    ],
  },
  {
    id: 'CAS',
    college: 'College of Arts and Sciences',
    courses: [
      {
        id: 'BAEcon',
        course: 'BA Economics',
      },
      {
        id: 'BAEL',
        course: 'BA English Language',
      },

      {
        id: 'BASoc',
        course: 'BA Sociology',
      },
      {
        id: 'BAPsy',
        course: 'BA Philosophy',
      },
      {
        id: 'BASS',
        course: 'BA Social Science',
      },

      {
        id: 'BSB-MB',
        course: 'BS Biology Major in Biotechnology',
      },
      {
        id: 'BSCD',
        course: 'BS Community Development',
      },
      {
        id: 'BSDC',
        course: 'BS Development Communication',
      },
      {
        id: 'BSEH-MEHS',
        course:
          'BS Environmental Science major in Environmental Heritage Studies',
      },
      {
        id: 'BSM',
        course: 'BS Mathematics',
      },
    ],
  },
  {
    id: 'COB',
    college: 'College of Business',
    courses: [
      {
        id: 'BSA',
        course: 'BS Accountancy',
      },
      {
        id: 'BSBA-MFM',
        course: 'BS Business Administration major in Financial Management',
      },
      {
        id: 'BSHM',
        course: 'BS Hospitality Management',
      },
    ],
  },
  {
    id: 'COE',
    college: 'College of Education',
    courses: [
      {
        id: 'BECE',
        course: 'Bachelor of Early Childhood Education',
      },
      {
        id: 'BEE',
        course: 'Bachelor of Elementary Education',
      },
      {
        id: 'BPE',
        course: 'Bachelor of Physical Education',
      },
      {
        id: 'BSEd-ME',
        course: 'Bachelor of Secondary Education Major in English',
      },
      {
        id: 'BSEd-MF',
        course: 'Bachelor of Secondary Education Major in Filipino',
      },
      {
        id: 'BSEd-MM',
        course: 'Bachelor of Secondary Education Major in Mathematics',
      },
      {
        id: 'BSEd-MS',
        course: 'Bachelor of Secondary Education Major in Science',
      },
      {
        id: 'BSEd-MSS',
        course: 'Bachelor of Secondary Education Major in Social Science',
      },
    ],
  },
  {
    id: 'COL',
    college: 'College of Law',
    courses: [
      {
        id: 'JD',
        course: 'Juris Doctor',
      },
    ],
  },
  {
    id: 'CON',
    college: 'College of Nursing',
    courses: [
      {
        id: 'BSN',
        course: 'BS Nursing',
      },
    ],
  },
  {
    id: 'COT',
    college: 'College of Technologies',
    courses: [
      {
        id: 'BSAT',
        course: 'BS Automotive Technology',
      },
      {
        id: 'BSET',
        course: 'BS Electronics Technology',
      },
      {
        id: 'BSEMC-MDAT',
        course:
          'BS Entertainment and Multimedia Computing major in Digital Animation Technology',
      },
      {
        id: 'BSFT',
        course: 'BS Food Technology',
      },
      {
        id: 'BSIT',
        course: 'BS Information Technology',
      },
    ],
  },
];

export const YEAR_LEVEL = [
  {
    id: 1,
    year: '1st Year',
  },
  {
    id: 2,
    year: '2nd Year',
  },
  {
    id: 3,
    year: '3rd Year',
  },
  {
    id: 4,
    year: '4th Year',
  },
  {
    id: 5,
    year: '5th Year',
  },
];
