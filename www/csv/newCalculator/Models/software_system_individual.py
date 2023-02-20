from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class software_system_individual(Base):
	__tablename__ = 'software_system_individual'
	id = Column(Integer, primary_key=True)
	SwID = Column(Text)
	EntryTime = Column(Text)
	ExitTime = Column(Text)
	Change = Column(Text)
